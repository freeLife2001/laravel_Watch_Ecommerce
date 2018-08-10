<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductBill;
use App\Models\Bill;
use Carbon\Carbon;
use DB;
use Auth;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index()
    {
        $data=Product::all();
        $survive=0;
        foreach ($data as $item){
            $survive += $item->total - $item->sold ;
        }
        $mess='Còn: '.$survive. ' sản phẩm tồn kho';
        return view('backend.report.index',compact('data','category','mess'));

    }
    public function sold()
    {
        $data=[];
        $mess='Thống kê đã bán';
        $to_date=date('Y-m-d');
        $from_date=Carbon::now()->subWeek()->format('Y-m-d');
        return view('backend.report.sold',compact('data','category','mess','from_date','to_date'));

    }
    public function search(Request $request)
    {

        $data=[];
        $mess='Thống kê tồn kho';
        return view('backend.report.index',compact('data','category','mess'));

    }
    public function soldSearch(ReportRequest $request)
    {
        $from_date=$request->from_date;
        $to_date=$request->to_date;
        $type=$request->type;
        //convert
        $data=[];
        if ($type==0){
            $from_date=date('Y-m-d',strtotime($from_date));
            $to_date=date('Y-m-d',strtotime($to_date.'+1 days'));
            if ($from_date>$to_date){
                return back()->with('error','Ngày bắt đầu không được lớn hơn ngày kết thúc');
            }
        }elseif ($type==1){
            $to_date=Carbon::now()->addDay()->format('Y-m-d');
            $from_date=Carbon::now()->subWeek()->format('Y-m-d');

        }elseif ($type==2){
            $to_date=Carbon::now()->addDay()->format('Y-m-d');
            $from_date=Carbon::now()->subMonth()->format('Y-m-d');
        }
        $bill=Bill::whereBetween('created_at',[$from_date,$to_date])->where('status',1)->pluck('id');
        $bill = json_decode(json_encode($bill), true);
        if (count($bill)<=0){
            $mess='Không có sản phẩm nào được bán trong khoảng: '.date('d-m-Y',strtotime($from_date)).' đến '.date('d-m-Y',strtotime($to_date));
            $data=[];
        }else{
            $data=ProductBill::whereIn('bill_id',$bill)
                ->join('product','product.id','product_bill.product_id')
                ->join('bill','bill.id','product_bill.bill_id')
                ->join('users','users.id','bill.user_info')
                ->select('product.*','product_bill.total as product_total_bill','product_bill.value as product_value_bill','users.name as buyer','bill.name as bill_name','product_bill.bill_id')
                ->get();
            $all_value=0;
            foreach ($data as $item){
                $all_value+=$item['product_value_bill'];
            }
            $data = json_decode(json_encode($data), true);
            $mess='Số lượng sản phẩm được bán trong khoảng '.date('d-m-Y',strtotime($from_date)).' đến '.date('d-m-Y',strtotime($to_date)).':<br> Sản phẩm: '.count($data).'<br>'.'Tổng tiền bán được: '.number_format($all_value) .'vnđ';

        }
        return view('backend.report.sold',compact('data','category','mess','from_date','to_date'));

    }

}
