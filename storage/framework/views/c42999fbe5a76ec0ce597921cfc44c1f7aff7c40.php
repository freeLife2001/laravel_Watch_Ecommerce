<?php $__env->startSection('page_title', __('voyager::generic.media')); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content container-fluid">
        <?php echo $__env->make('voyager::alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="row">
            <div class="col-md-12">

                <div class="admin-section-title">
                    <h3><i class="voyager-images"></i> <?php echo e(__('voyager::generic.media')); ?></h3>
                </div>
                <div class="clear"></div>

                <div id="filemanager">

                    <div id="toolbar">
                        <div class="btn-group offset-right">
                            <button type="button" class="btn btn-primary" id="upload"><i class="voyager-upload"></i>
                                <?php echo e(__('voyager::generic.upload')); ?>

                            </button>
                            <button type="button" class="btn btn-primary" id="new_folder"
                                    onclick="jQuery('#new_folder_modal').modal('show');"><i class="voyager-folder"></i>
                                <?php echo e(__('voyager::generic.add_folder')); ?>

                            </button>
                        </div>
                        <button type="button" class="btn btn-default" id="refresh"><i class="voyager-refresh"></i>
                        </button>
                        <div class="btn-group offset-right">
                            <button type="button" class="btn btn-default" id="move"><i class="voyager-move"></i> <?php echo e(__('voyager::generic.move')); ?>

                            </button>
                            <button type="button" class="btn btn-default" id="rename"><i class="voyager-character"></i>
                                <?php echo e(__('voyager::generic.rename')); ?>

                            </button>
                            <button type="button" class="btn btn-default" id="delete"><i class="voyager-trash"></i>
                                <?php echo e(__('voyager::generic.delete')); ?>

                            </button>
							<button v-show="selectedFileIs('image')" type="button" class="btn btn-default" id="crop"><i class="voyager-crop"></i>
                                <?php echo e(__('voyager::media.crop')); ?>

                            </button>
                        </div>
                    </div>

                    <div id="uploadPreview" style="display:none;"></div>

                    <div id="uploadProgress" class="progress active progress-striped">
                        <div class="progress-bar progress-bar-success" style="width: 0"></div>
                    </div>

                    <div id="content">


                        <div class="breadcrumb-container">
                            <ol class="breadcrumb filemanager">
                                <li class="media_breadcrumb" data-folder="/" data-index="0"><span class="arrow"></span><strong><?php echo e(__('voyager::media.library')); ?></strong></li>
                                <template v-for="(folder, index) in folders">
                                    <li v-bind:data-folder="folder" v-bind:data-index="index+1"
									v-bind:class="{media_breadcrumb: index !== folders.length - 1}"><span
                                                class="arrow"></span>{{ folder }}</li>

                                </template>
                            </ol>

                            <div class="toggle"><span><?php echo e(__('voyager::generic.close')); ?></span><i class="voyager-double-right"></i></div>
                        </div>
                        <div class="flex">

                            <div id="left">

                                <ul id="files">

                                    <li v-for="(file,index) in files.items">
                                        <div class="file_link" :data-folder="file.name" :data-index="index">
                                            <div class="link_icon">
                                                <template v-if="file.type.includes('image')">
                                                    <div class="img_icon" :style="imgIcon(file.path)"></div>
                                                </template>
                                                <template v-if="file.type.includes('video')">
                                                    <i class="icon voyager-video"></i>
                                                </template>
                                                <template v-if="file.type.includes('audio')">
                                                    <i class="icon voyager-music"></i>
                                                </template>
												<template v-if="file.type.includes('zip')">
                                                    <i class="icon voyager-archive"></i>
                                                </template>
                                                <template v-if="file.type == 'folder'">
                                                    <i class="icon voyager-folder"></i>
                                                </template>
                                                <template
                                                        v-if="file.type != 'folder' && !file.type.includes('image') && !file.type.includes('video') && !file.type.includes('audio') && !file.type.includes('zip')">
                                                    <i class="icon voyager-file-text"></i>
                                                </template>

                                            </div>
                                            <div class="details" :data-type="file.type">
                                                <div :class="file.type">
                                                    <h4>{{ file.name }}</h4>
                                                    <small>
                                                        <template v-if="file.type == 'folder'">
                                                        <!--span class="num_items">{{ file.items }} file(s)</span-->
                                                        </template>
                                                        <template v-else>
                                                            <span class="file_size">{{ file.size }}</span>
                                                        </template>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>

                                <div id="file_loader">
                                    <?php $admin_loader_img = Voyager::setting('admin.loader', ''); ?>
                                    <?php if($admin_loader_img == ''): ?>
                                        <img src="<?php echo e(voyager_asset('images/logo-icon.png')); ?>" alt="Voyager Loader">
                                    <?php else: ?>
                                        <img src="<?php echo e(Voyager::image($admin_loader_img)); ?>" alt="Voyager Loader">
                                    <?php endif; ?>
                                    <p><?php echo e(__('voyager::media.loading')); ?></p>
                                </div>

                                <div id="no_files">
                                    <h3><i class="voyager-meh"></i> <?php echo e(__('voyager::media.no_files_in_folder')); ?></h3>
                                </div>

                            </div>

                            <div id="right">
                                <div class="right_none_selected">
                                    <i class="voyager-cursor"></i>
                                    <p><?php echo e(__('voyager::media.nothing_selected')); ?></p>
                                </div>
                                <div class="right_details">
                                    <div class="detail_img">
                                        <div :class="selected_file.type">
                                            <template v-if="selectedFileIs('image')">
                                                <img :src="selected_file.path"/>
                                            </template>
                                            <template v-if="selectedFileIs('video')">
                                                <video width="100%" height="auto" controls>
                                                    <source :src="selected_file.path" type="video/mp4">
                                                    <source :src="selected_file.path" type="video/ogg">
                                                    <source :src="selected_file.path" type="video/webm">
                                                    <?php echo e(__('voyager::media.browser_video_support')); ?>

                                                </video>
                                            </template>
                                            <template v-if="selectedFileIs('audio')">
												<i class="voyager-music"></i>
                                                <audio controls style="width:100%; margin-top:5px;">
                                                    <source :src="selected_file.path" type="audio/ogg">
                                                    <source :src="selected_file.path" type="audio/mpeg">
                                                    <?php echo e(__('voyager::media.browser_audio_support')); ?>

                                                </audio>
                                            </template>
											<template v-if="selectedFileIs('zip')">
                                                <i class="voyager-archive"></i>
                                            </template>
                                            <template v-if="selected_file.type == 'folder'">
                                                <i class="voyager-folder"></i>
                                            </template>
                                            <!--template
                                                    v-if="selected_file.type != 'folder' && !selectedFileIs('audio') && !selectedFileIs('video') && !selectedFileIs('image')">
                                                <i class="voyager-file-text-o"></i>
                                            </template>-->
                                        </div>

                                    </div>
                                    <div class="detail_info">
                                        <div :class="selected_file.type">
                                            <span><h4><?php echo e(__('voyager::media.title')); ?>:</h4>
    							            <p>{{selected_file.name}}</p></span>
                                            <span><h4><?php echo e(__('voyager::media.type')); ?>:</h4>
    							            <p>{{selected_file.type}}</p></span>

                                            <template v-if="selected_file.type != 'folder'">
    								            <span><h4><?php echo e(__('voyager::media.size')); ?>:</h4>
    								            <p><span class="selected_file_count">{{ selected_file.items }} item(s)</span><span
                                                    class="selected_file_size">{{selected_file.size}}</span></p></span>
                                                <span><h4><?php echo e(__('voyager::media.public_url')); ?>:</h4>
    								            <p><a :href="selected_file.path" target="_blank">Click Here</a></p></span>
                                                <span><h4><?php echo e(__('voyager::media.last_modified')); ?>:</h4>
    								            <p>{{ dateFilter(selected_file.last_modified) }}</p></span>
                                            </template>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- #right -->

                        </div>

                        <div class="nothingfound">
                            <div class="nofiles"></div>
                            <span><?php echo e(__('voyager::media.no_files_here')); ?></span>
                        </div>

                    </div>

                    <!-- Move File Modal -->
                    <div class="modal fade modal-warning" id="move_file_modal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><i class="voyager-move"></i> <?php echo e(__('voyager::media.move_file_folder')); ?></h4>
                                </div>

                                <div class="modal-body">
                                    <h4><?php echo e(__('voyager::media.destination_folder')); ?></h4>
                                    <select id="move_folder_dropdown">
                                        <template v-if="folders.length">
                                            <option value="/../">../</option>
                                        </template>
                                        <template v-for="dir in directories">
                                            <option :value="dir">{{ dir }}</option>
                                        </template>
                                    </select>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('voyager::generic.cancel')); ?></button>
                                    <button type="button" class="btn btn-warning" id="move_btn"><?php echo e(__('voyager::generic.move')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Move File Modal -->

                    <!-- Rename File Modal -->
                    <div class="modal fade modal-warning" id="rename_file_modal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><i class="voyager-character"></i> <?php echo e(__('voyager::media.rename_file_folder')); ?></h4>
                                </div>

                                <div class="modal-body">
                                    <h4><?php echo e(__('voyager::media.new_file_folder')); ?></h4>
                                    <input id="new_filename" class="form-control" type="text"
                                           :value="selected_file.name">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('voyager::generic.cancel')); ?></button>
                                    <button type="button" class="btn btn-warning" id="rename_btn"><?php echo e(__('voyager::generic.rename')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Move File Modal -->

					<!-- Image Modal -->
					<div class="modal fade" id="imagemodal">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
								<div class="modal-body">
									<img :src="selected_file.path" class="img img-responsive" style="margin: 0 auto;">
								</div>

								<div class="modal-footer text-left">
									<small class="image-title">{{ selected_file.name }}</small>
								</div>

							</div>
						</div>
					</div>
					<!-- End Image Modal -->

					<!-- Crop Image Modal -->
                    <div class="modal fade modal-warning" id="confirm_crop_modal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><i class="voyager-warning"></i> <?php echo e(__('voyager::media.crop_image')); ?></h4>
                                </div>

                                <div class="modal-body">
                                    <div class="crop-container">
                                        <img v-if="selectedFileIs('image')" id="cropping-image" class="img img-responsive" :src="selected_file.path + '?' + selected_file.last_modified"/>
                                    </div>
                                    <div class="new-image-info">
                                        <?php echo e(__('voyager::media.width')); ?> <span id="new-image-width"></span>, <?php echo e(__('voyager::media.height')); ?><span id="new-image-height"></span>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('voyager::generic.cancel')); ?></button>
                                    <button type="button" class="btn btn-warning" id="crop_btn" data-confirm="<?php echo e(__('voyager::media.crop_override_confirm')); ?>"><?php echo e(__('voyager::media.crop')); ?></button>
                                    <button type="button" class="btn btn-warning" id="crop_and_create_btn"><?php echo e(__('voyager::media.crop_and_create')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Crop Image Modal -->


                </div><!-- #filemanager -->

                <!-- New Folder Modal -->
                <div class="modal fade modal-info" id="new_folder_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><i class="voyager-folder"></i> <?php echo e(__('voyager::media.add_new_folder')); ?></h4>
                            </div>

                            <div class="modal-body">
                                <input name="new_folder_name" id="new_folder_name" placeholder="<?php echo e(__('voyager::media.new_folder_name')); ?>"
                                       class="form-control" value=""/>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('voyager::generic.cancel')); ?></button>
                                <button type="button" class="btn btn-info" id="new_folder_submit"><?php echo e(__('voyager::media.create_new_folder')); ?>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End New Folder Modal -->

                <!-- Delete File Modal -->
                <div class="modal fade modal-danger" id="confirm_delete_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><i class="voyager-warning"></i> <?php echo e(__('voyager::generic.are_you_sure')); ?></h4>
                            </div>

                            <div class="modal-body">
                                <h4><?php echo e(__('voyager::generic.are_you_sure_delete')); ?> '<span class="confirm_delete_name"></span>'</h4>
                                <h5 class="folder_warning"><i class="voyager-warning"></i> <?php echo e(__('voyager::media.delete_folder_question')); ?></h5>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('voyager::generic.cancel')); ?></button>
                                <button type="button" class="btn btn-danger" id="confirm_delete"><?php echo e(__('voyager::generic.delete_confirm')); ?>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Delete File Modal -->

                <div id="dropzone"></div>
                <!-- Delete File Modal -->
                <div class="modal fade" id="upload_files_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><i class="voyager-warning"></i> <?php echo e(__('voyager::media.drag_drop_info')); ?></h4>
                            </div>

                            <div class="modal-body">

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal"><?php echo e(__('voyager::generic.all_done')); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Delete File Modal -->


            </div><!-- .row -->
        </div><!-- .col-md-12 -->
    </div><!-- .page-content container-fluid -->

    <input type="hidden" id="storage_path" value="<?php echo e(storage_path()); ?>">
    <input type="hidden" id="base_url" value="<?php echo e(route('voyager.dashboard')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

    <script>
        MediaManager();
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>