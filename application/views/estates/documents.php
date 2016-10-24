<?php echo $this->load->view('inculdes/header')?>
    <head>
    	 <title><?php echo $title;?></title>
		  <link href="<?php echo base_url()?>resources/assets/css/fileupload/bootstrap.min.css" rel="stylesheet" type="text/css">
          <link href="<?php echo base_url()?>resources/assets/css/fileupload/bootstrap-image-gallery.min.css" rel="stylesheet" type="text/css">
           <link href="<?php echo base_url()?>resources/assets/css/fileupload/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">
          <script  type="text/javascript" src="<?php echo base_url();?>resources/assets/js/fileupload/tmpl.js" ></script>
          <script  type="text/javascript" src="<?php echo base_url();?>resources/assets/js/fileupload/load-image.js" ></script>
          <script  type="text/javascript" src="<?php echo base_url();?>resources/assets/js/fileupload/canvas-to-blob.js" ></script>
          <script  type="text/javascript" src="<?php echo base_url();?>resources/assets/js/fileupload/bootstrap.min.js" ></script>
          <script  type="text/javascript" src="<?php echo base_url();?>resources/assets/js/fileupload/bootstrap-image-gallery.min.js" ></script>
          <script  type="text/javascript" src="<?php echo base_url();?>resources/assets/js/fileupload/jquery.iframe-transport.js" ></script>
          <script  type="text/javascript" src="<?php echo base_url();?>resources/assets/js/fileupload/jquery.fileupload.js" ></script>
          <script  type="text/javascript" src="<?php echo base_url();?>resources/assets/js/fileupload/jquery.fileupload-ip.js" ></script>
          <script  type="text/javascript" src="<?php echo base_url();?>resources/assets/js/fileupload/jquery.fileupload-ui.js" ></script>
          <script  type="text/javascript" src="<?php echo base_url();?>resources/assets/js/fileupload/locale.js" ></script>
          <script  type="text/javascript" src="<?php echo base_url();?>resources/assets/js/fileupload/main.js" ></script>
     </head>
     
<body>
<div class="box">
					<div class="title">

					<h5><?php echo $title;?> </h5>
					</div>

					<div class="table">	
<div id="upload-img">
    <h2>مركز رفع الملفات</h2>

<!-- Upload function on action form -->
   <?php echo form_open_multipart('admin/upload/upload_img','id=fileupload')?>

<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
    <div class="row fileupload-buttonbar">

        <div class="span7">

<!-- The fileinput-button span is used to style the file input field as button -->
            <span class="btn btn-success fileinput-button">
                <span><i class="icon-plus icon-white"></i> إضافة ملفات...</span>
<!-- Replace name of this input by userfile-->
                <input type="file" name="userfile" multiple>
            </span>
            <button type="submit" class="btn btn-primary start">
                <i class="icon-upload icon-white"></i> بدأ الرفع
           </button>
           <button type="reset" class="btn btn-warning cancel">
                <i class="icon-ban-circle icon-white"></i> إلغاء الرفع
          </button>
         <!--   <button type="button" class="btn btn-danger delete">
               <i class="icon-trash icon-white"></i> حذف
          </button>
         
          <input type="checkbox" class="toggle">
       </div>
        -->
       <div class="span5">

 <!-- The global progress bar -->
        <div class="progress progress-success progress-striped active fade">
             <div class="bar" style="width:0%;"></div>
        </div>
     </div>
  </div>

<!-- The loading indicator is shown during image processing -->
   <div class="fileupload-loading"></div>
        <br>
<!-- The table listing the files available for upload/download -->
        <table class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
       <?php echo form_hidden('documents',TRUE)?>
       <?php echo form_hidden('estate_id',$this->uri->segment(4))?>
  <?php echo form_close();?>
</div>
  <div id="modal-gallery" class="modal modal-gallery hide fade">
                            <div class="modal-header">
                                <a class="close" data-dismiss="modal">&times;</a>
                                <h3 class="modal-title"></h3>
                            </div>
                            <div class="modal-body"><div class="modal-image"></div></div>
                            <div class="modal-footer">
                                <a class="btn btn-primary modal-next">التالى <i class="icon-arrow-right icon-white"></i></a>
                                <a class="btn btn-info modal-prev"><i class="icon-arrow-left icon-white"></i> السابق</a>
                                <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000"><i class="icon-play icon-white"></i> عرض شرائح</a>
                                <a class="btn modal-download" target="_blank"><i class="icon-download"></i> تحميل</a>
                            </div>
                        </div>

<!-- The template text-tmpl upload/download -->

<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td class="preview"><span class="fade"></span></td>
        <td class="name"><span>{%=file.name%}</span></td>
        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
        {% if (file.error) { %}
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
            <td>
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
            </td>
            <td class="start">{% if (!o.options.autoUpload) { %}
                <button class="btn btn-primary">
                    <i class="icon-upload icon-white"></i>
                    <span>بدأ الرفع</span>
                </button>
            {% } %}</td>
        {% } else { %}
            <td colspan="2"></td>
        {% } %}
        <td class="cancel">{% if (!i) { %}
            <button class="btn btn-warning">
                <i class="icon-ban-circle icon-white"></i>
                <span>إلغاء</span>
            </button>
        {% } %}</td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        {% if (file.error) { %}
            <td></td>
            <td class="name"><span>{%=file.name%}</span></td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else { %}
            <td class="preview">{% if (file.thumbnail_url) { %}
                <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
            {% } %}</td>
            <td class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
            </td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td colspan="2"></td>
        {% } %}
        <td class="delete">
            <button class="btn btn-danger" name="public" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
                <i class="icon-trash icon-white"></i>
                <span>حذف</span>
            </button>
            <input type="checkbox" name="delete" value="1">
        </td>
    </tr>
{% } %}
</script>
</div>
<?php echo $this->load->view('inculdes/footer')?>