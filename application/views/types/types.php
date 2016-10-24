<script type="text/javascript">
/* this function styles inputs with the type file. It basically replaces browse or choose with a custom button */
(function ($) {
    $.fn.file = function (options) {
        var settings = {
            width: 250
        };
        if (options) {
            $.extend(settings, options);
        }
        this.each(function () {
            var self = this;
            var wrapper = $("<a>").attr("class", "ui-input-file");
            var filename = $('<input class="file">').addClass($(self).attr("class")).css({
                "display": "inline",
                "width": settings.width + "px"
            });
            $(self).before(filename);
            $(self).wrap(wrapper);
            if ($.browser.mozilla) {
                if (/Win/.test(navigator.platform)) {
                    $(self).css("margin-left", "-142px");
                } else {
                    $(self).css("margin-left", "-168px");
                };
            } else {

                $(self).css("margin-left", settings.image_width - settings.width + "px");
            };
            $(self).bind("change", function () {

                filename.val($(self).val());
            });
        });
        return this;
    };
})(jQuery);
$(document).ready(function () {
    $("input.focus, textarea.focus").focus(function () {
        if (this.value == this.defaultValue) {
            this.value = "";
        }
        else {
           this.select();
        }
    });
    $("input.focus, textarea.focus").blur(function () {
        if ($.trim(this.value) == "") {
            this.value = (this.defaultValue ? this.defaultValue : "");
        }
    });
    /* date picker */
    $(".date").datepicker({
        showOn: 'both',
        buttonImage: 'resources/images/ui/calendar.png',
        buttonImageOnly: true
    });
    /* select styling */
    $("select").selectmenu({
        style: 'dropdown',
        width: 200,
        menuWidth: 200,
        icons: [
		    { find: '.locked', icon: 'ui-icon-locked' },

		    { find: '.unlocked', icon: 'ui-icon-unlocked' },

		    { find: '.folder-open', icon: 'ui-icon-folder-open' }
	    ]
    });
    /* file input styling */
    $("input[type=file]").file({
        image_height: 28,
        image_width: 28,
        width: 250
    });
    $("input:submit, input:reset, button").button();

});
</script>
<?php if(is_array($rows)){?>
<div class="field">
			<label for="age">الوحدة</label>
			<div class="input">
				<?php $class= array();
				if(is_array($rows))
				{
					foreach ($rows as $key => $value) {
						$class[$value['id']] = $value['name'];
					}
				}
			echo form_dropdown('sub_type', $class,"","id='dtypes'")."<p/>";?>
			</div>
			</div>
			<?php }
				else
				{ 
				?>
					<div id="message-warning" class="message message-warning">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/warning.png')?>" alt="error" height="32" />
								</div>
								<div class="text">

									<span>لا  توجد بيانات مضافة تحت تصنيف ( <?php echo $type[0]['type']?> )</span>
									<span> <?php echo anchor("admin/SubTypes/add/".$type[0]['id'],"إضافة بيانات")?> </span>
								</div>
								<div class="dismiss">
									<a href="message-warning"></a>
								</div>
							</div>
				<?php }?>
			