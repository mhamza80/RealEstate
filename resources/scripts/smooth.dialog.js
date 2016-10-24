jQuery(function($) {

    $("#dialog").dialog({

        autoOpen: false

    });



    $("#dialog-open").click(function () {

        $("#dialog").dialog("open");

        return false;

    });


    $("#dialog-modal").dialog({

        autoOpen: false,

        height: 140,

        modal: true

    });


    $("#dialog-modal-open").click(function () {

        $("#dialog-modal").dialog("open");

        return false;

    });



    $("#dialog-message").dialog({

        autoOpen: false,

        modal: true,

        buttons: {

            Ok: function () {

                $(this).dialog('close');

            }

        }

    });



    $("#dialog-message-open").click(function () {

        $("#dialog-message").dialog("open");

        return false;

    });



  $("#dialog-confirm").dialog({
      autoOpen: false,
      modal: true,
	  resizable: true,
	  
    });
 

  $("a.test").click(function(e) {
    e.preventDefault();
    var targetUrl = $(this).attr("href");

    $("#dialog-confirm").dialog({
      buttons : {
        "حذف" : function() {
          window.location.href = targetUrl;
        },
        "إلغاء" : function() {
          $(this).dialog("close");
        }
      }
    });

    $("#dialog-confirm").dialog("open");
  });
  
   $("#dialog-confirm-archive").dialog({
      autoOpen: false,
      modal: true,
	  resizable: true,
	  
    });
 

  $("a.archive").click(function(e) {
    e.preventDefault();
    var targetUrl = $(this).attr("href");

    $("#dialog-confirm-archive").dialog({
      buttons : {
        "موافق" : function() {
          window.location.href = targetUrl;
        },
        "إلغاء" : function() {
          $(this).dialog("close");
        }
      }
    });

    $("#dialog-confirm-archive").dialog("open");
  });
  
  
	$(function() {
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		
		var name = $( "#name" ),
			email = $( "#email" ),
			pro = $("#pro"),
			phone = $("#phone"),
			title = $("#title"),
			file = $("#file"),
			condition = $(".condition"),
			details = $("#details"),
			log = $("#log"),
			carerr = $("#carrer"),
			pass = $( "#pass" ),
			amount = $("#amount"),
			number = $("#number"),
			allFields = $( [] ).add( name ).add( email ).add( pass ) .add(carerr) .add(phone) .add(log) .add(title) . add(condition) .add(details) 
			.add(file);
			tips = $( ".validateTips" );

		function updateTips( t ) {
			tips
				.text( t )
				.addClass( "ui-state-highlight" );
			setTimeout(function() {
				tips.removeClass( "ui-state-highlight", 1500 );
			}, 500 );
		}

		function checkLength( o, n, min, max ) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass( "ui-state-error" );
				updateTips( "عدد احرف " + n + " يجب ان يكون بين " +
					min + " إلى " + max + "." );
				return false;
			} else {
				return true;
			}
		}
		
		function isEmpty(o,n){
			if (o.val()==null || o.val()=="" ) {
		o.addClass( "ui-state-error" );
				updateTips( "حقل" + " " +  n +  " " + "لابد من تعبئته" );
				return false;
			} else {
				return true;
			}
		}


		function checkRegexp( o, regexp, n ) {
			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass( "ui-state-error" );
				updateTips( n );
				return false;
			} else {
				return true;
			}
		}
		
		function checkIntger(o,n)
		{
			if(parseInt(o.val()))
				{
					return true;
				}
			else
				{
					o.addClass( "ui-state-error" );
					updateTips( "حقل" + " " +  n +  " " + "لابد من ارقام فقط" );
					return false;
				}
		}
		
		function Checkfiles()
		{
		var fup = document.getElementById('photo');
		var fileName = fup.value;
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "doc")
		{
		return true;
		}
		else
		{
		alert("يتم يرفع الصور بإمتداد jpg أو gif فقط");
		fup.focus();
		return false;
		}
		}

		


   		$( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 600,
			width: 550,
			modal: true,
			buttons: {
				"حفظ": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );

					bValid = bValid && isEmpty( name, "الاسم");
					bValid = bValid && isEmpty( phone, "رقم الجوال");
					bValid = bValid && checkLength( email, "البريد الإلكترونى", 6, 80 );
					bValid = bValid && isEmpty( log, "اسم الدخول");
					bValid = bValid && checkLength( pass, "كلمة المرور", 5, 16 );
					

				
					// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
					bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "mail@mail.com يجب ان يكون البريد على هيئة " );
					bValid = bValid && checkRegexp( pass, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );

					if ( bValid ) {
						form = $("#myform");
						$.ajax({
						type: 'POST',
						 url: form.attr('action'),
						data: $('#myform :input').serialize(),
						
						success: function(i)
						{
		                    window.setTimeout(function(){location.reload()},500)

						},
						});
						$( this ).dialog( "close" );
					}
				},
				إلغاء: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
	
		
		
		$( "#create-user" )
			.button()
			.click(function() {
				$( "#dialog-form" ).dialog( "open" );
			});
			
			
			$( "#dialog-form-condtion" ).dialog({
			autoOpen: false,
			height: 280,
			width: 550,
			modal: true,
			buttons: {
				"حفظ": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );

				
					bValid = bValid && isEmpty( title, "العنوان");
					bValid = bValid && isEmpty( condition, "الوصف");
					if ( bValid ) {
						$.ajax({
						type: 'POST',
						url: 'create_condition',
						data: $('#conditions :input').serialize(),
						
						success: function(i)
						{
							$("#emp").load("trans_recevied #emp");

						},
						});
						$( this ).dialog( "close" );
					}
				},
				إلغاء: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
			
			$( "#condition" )
			.button()
			.click(function() {
				$( "#dialog-form-condtion" ).dialog( "open" );
			});
			
		
			
			$( "#dialog-add-type-sub" ).dialog({
			autoOpen: false,
			height: 250,
			width: 500,
			modal: true,
			buttons: {
				"حفظ": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );

				
					bValid = bValid && isEmpty( name, "تصنيف العقار");
					if ( bValid ) {
						form = $("#type");
						$.ajax({
						type: 'POST',
						 url: form.attr('action'),
						data: $('#type :input').serialize(),
						
						success: function(i)
						{
							alert('تم الاضافة بنجاح ');
		                    window.setTimeout(function(){location.reload()},500)

						},
						});
						$( this ).dialog( "close" );
					}
				},
				إلغاء: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
			
			$( "#sub-type" )
			.button()
			.click(function() {
				$( "#dialog-add-type-sub" ).dialog( "open" );
			});
			
				$( "#dialog-form-committees" ).dialog({
			autoOpen: false,
			height: 250,
			width: 500,
			modal: true,
			buttons: {
				"حفظ": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );

				
					bValid = bValid && isEmpty( name, "الاسم");
					if ( bValid ) {
						$.ajax({
						type: 'POST',
						url: 'committees_section',
						data: $('#committees :input').serialize(),
						
						success: function(i)
						{
							$("#emp").load("committees_required #emp");

						},
						});
						$( this ).dialog( "close" );
					}
				},
				إلغاء: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
			
			$( "#sections" )
			.button()
			.click(function() {
				$( "#dialog-form-committees" ).dialog( "open" );
			});
		
			
				$( "#dialog-add-type" ).dialog({
			autoOpen: false,
			height: 250,
			width: 500,
			modal: true,
			buttons: {
				"حفظ": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					
					bValid = bValid && isEmpty( name, "الاسم");
					if ( bValid ) {
						$.ajax({
						type: 'POST',
						url: 'add_type',
						data: $('#type :input').serialize(),
						
						success: function(i)
						{
							$("#emp").load("transaction_type #emp");

						},
						});
						$( this ).dialog( "close" );
					}
				},
				إلغاء: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
			
			$( "#add-type" )
			.button()
			.click(function() {
				$( "#dialog-add-type" ).dialog( "open" );
			});

			
			$( "#dialog-add-project" ).dialog({
			autoOpen: false,
			height: 250,
			width: 500,
			modal: true,
			buttons: {
				"حفظ": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					
					bValid = bValid && isEmpty( name, "الاسم");
					if ( bValid ) {
						$.ajax({
						type: 'POST',
						url: 'add_project_type',
						data: $('#type :input').serialize(),
						
						success: function(i)
						{
							$("#emp").load("projects_type #emp");

						},
						});
						$( this ).dialog( "close" );
					}
				},
				إلغاء: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
			
			$( "#add-project" )
			.button()
			.click(function() {
				$( "#dialog-add-project" ).dialog( "open" );
			});
			
				$( "#dialog-add-classifi" ).dialog({
			autoOpen: false,
			height: 250,
			width: 500,
			modal: true,
			buttons: {
				"حفظ": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					
					bValid = bValid && isEmpty( name, "المدينة");
					if ( bValid ) {
						$.ajax({
						type: 'POST',
						url: 'add',
						data: $('#city :input').serialize(),
						
						success: function(i)
						{
							 alert('تم الإضافة بنجاح ');
			                  window.setTimeout(function(){location.reload()},500)

						},
						});
						$( this ).dialog( "close" );
					}
				},
				إلغاء: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
			
			$( "#add-classifi" )
			.button()
			.click(function() {
				$( "#dialog-add-classifi" ).dialog( "open" );
			});
			
			
			$( "#dialog-add-identity" ).dialog({
			autoOpen: false,
			height: 250,
			width: 500,
			modal: true,
			buttons: {
				"حفظ": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					
					bValid = bValid && isEmpty( name, "الهوية");
					if ( bValid ) {
						$.ajax({
						type: 'POST',
						url: 'add',
						data: $('#identity :input').serialize(),
						
						success: function(i)
						{
							alert('تم الإضافة بنجاح ');
			                window.setTimeout(function(){location.reload()},500)

						}
						});
						$( this ).dialog( "close" );
					}
				},
				إلغاء: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
			
			$( "#add-identity" )
			.button()
			.click(function() {
				$( "#dialog-add-identity" ).dialog( "open" );
			});
			
			
			
			$( "#dialog-add-producer" ).dialog({
				autoOpen: false,
				height: 250,
				width: 500,
				modal: true,
				buttons: {
					"حفظ": function() {
						var bValid = true;
						allFields.removeClass( "ui-state-error" );
						
						bValid = bValid && isEmpty( name, "نوع العقار");
						if ( bValid ) {
							$.ajax({
							type: 'POST',
							url: 'add',
							data: $('#estate :input').serialize(),
							
							success: function(i)
							{
								alert('تم الإضافة بنجاح ');
				                window.setTimeout(function(){location.reload()},500)

							}
							});
							$( this ).dialog( "close" );
						}
					},
					إلغاء: function() {
						$( this ).dialog( "close" );
					}
				},
				close: function() {
					allFields.val( "" ).removeClass( "ui-state-error" );
				}
			});
				
				$( "#add-producer" )
				.button()
				.click(function() {
					$( "#dialog-add-producer" ).dialog( "open" );
				});
				
				$( "#dialog-add-sms" ).dialog({
					autoOpen: false,
					height: 350,
					width: 500,
					modal: true,
					buttons: {
						"حفظ": function() {
							var bValid = true;
							allFields.removeClass( "ui-state-error" );
							
							bValid = bValid && isEmpty( name, "إسم المستخدم");
							bValid = bValid && isEmpty( pass, "كلمة المرور");
							if ( bValid ) {
								form = $("#myform");
								$.ajax({
								type: 'POST',
								 url: form.attr('action'),
								data: $('#myform :input').serialize(),
								
								success: function(i)
								{
									alert('تم إلإضافة بنجاح ');
				                    window.setTimeout(function(){location.reload()},500)

								}
								});
								$( this ).dialog( "close" );
							}
						},
						إلغاء: function() {
							$( this ).dialog( "close" );
						}
					},
					close: function() {
						allFields.val( "" ).removeClass( "ui-state-error" );
					}
				});
					
					$("#add-sms")
					.click(function() {
						$( "#dialog-add-sms" ).dialog( "open" );
					});
					
					$( "#dialog-add-pay" ).dialog({
						autoOpen: false,
						height: 650,
						width: 500,
						modal: true,
						buttons: {
							"حفظ": function() {
								var bValid = true;
								allFields.removeClass( "ui-state-error" );
								
								bValid = bValid && checkIntger( amount, "المبلغ");
								bValid = bValid && isEmpty( name, "الإيضاح");
								if ( bValid ) {
									form = $("#vo");
									$.ajax({
									type: 'POST',
									 url: form.attr('action'),
									data: $('#vo :input').serialize(),
									
									success: function(i)
									{
										 va = $("#add-pay").val();
									}
									});
									$( this ).dialog( "close" );
								}
							},
							إلغاء: function() {
								$( this ).dialog( "close" );
							}
						},
						close: function() {
							allFields.val( "" ).removeClass( "ui-state-error" );
						}
					});
						
						$("#add-pay")
						.click(function() {
							
							$( "#dialog-add-pay" ).dialog( "open" );
						});
						
						
						$( "#dialog-add-income" ).dialog({
							autoOpen: false,
							height: 650,
							width: 500,
							modal: true,
							buttons: {
								"حفظ": function() {
									var bValid = true;
									allFields.removeClass( "ui-state-error" );
						
									if ( bValid ) {
										form = $("#income");
										$.ajax({
										type: 'POST',
										 url: form.attr('action'),
										data: $('#income :input').serialize(),
										
										success: function(i)
										{
											 window.setTimeout(function(){location.reload()},500)
										}
										});
										$( this ).dialog( "close" );
									}
								},
								إلغاء: function() {
									$( this ).dialog( "close" );
								}
							},
							close: function() {
								allFields.val( "" ).removeClass( "ui-state-error" );
							}
						});
							
							$("#add-income")
							.click(function() {
								
								$( "#dialog-add-income" ).dialog( "open" );
							});
							
							$( "#dialog-add-days" ).dialog({
								autoOpen: false,
								height: 250,
								width: 450,
								modal: true,
								buttons: {
									"حفظ": function() {
										var bValid = true;
										allFields.removeClass( "ui-state-error" );
										
										bValid = bValid && checkIntger( name, "عدد الإيام ");
										if ( bValid ) {
											form = $("#myform");
											$.ajax({
											type: 'POST',
											 url: form.attr('action'),
											data: $('#myform :input').serialize(),
											
											success: function(i)
											{
							                    window.setTimeout(function(){location.reload()},500)

											}
											});
											$( this ).dialog( "close" );
										}
									},
									إلغاء: function() {
										$( this ).dialog( "close" );
									}
								},
								close: function() {
									allFields.val( "" ).removeClass( "ui-state-error" );
								}
							});
								
								$("#add-days")
								.click(function() {
									$( "#dialog-add-days" ).dialog( "open" );
								});
								
								$( "#dialog-contract" ).dialog({
									autoOpen: false,
									height: 900,
									width: 600,
									modal: true,
									buttons: {
										"حفظ": function() {
											var bValid = true;
											allFields.removeClass( "ui-state-error" );

											bValid = bValid && isEmpty( name, "الاسم");
											//bValid = bValid && isEmpty( phone, "رقم الجوال");
											//bValid = bValid && checkLength( email, "البريد الإلكترونى", 6, 80 );
											//bValid = bValid && isEmpty( log, "اسم الدخول");
											if ( bValid ) {
												form = $("#myform");
												$.ajax({
												type: 'POST',
												 url: form.attr('action'),
												data: $('#myform :input').serialize(),
												
												success: function(i)
												{
								                    window.setTimeout(function(){location.reload()},500)
												},
												});
												$( this ).dialog( "close" );
											}
										},
										إلغاء: function() {
											$( this ).dialog( "close" );
										}
									},
									close: function() {
										allFields.val( "" ).removeClass( "ui-state-error" );
									}
								});
							
								$( "#create-contract" )
									.button()
									.click(function() {
										$( "#dialog-contract" ).dialog( "open" );
									});
								
								$( "#dialog-add-contract" ).dialog({
									autoOpen: false,
									height: 250,
									width: 350,
									modal: true,
									buttons: {
										"حفظ": function() {
											var bValid = true;
											allFields.removeClass( "ui-state-error" );
											bValid = bValid && isEmpty( name, "الاسم");											
											if ( bValid ) {
												form = $("#myform");
												$.ajax({
												type: 'POST',
												 url: form.attr('action'),
												data: $('#myform :input').serialize(),
												
												success: function(i)
												{
													alert('تم الاضافة بنجاح ');
								                    window.setTimeout(function(){location.reload()},500)
												},
												});
												$( this ).dialog( "close" );
											}
										},
										إلغاء: function() {
											$( this ).dialog( "close" );
										}
									},
									close: function() {
										allFields.val( "" ).removeClass( "ui-state-error" );
									}
								});
							
								$( "#add-contract" )
									.button()
									.click(function() {
										$( "#dialog-add-contract" ).dialog( "open" );
									});
								
								
								
								
								
								
								$( "#dialog-add-contracts" ).dialog({
									autoOpen: false,
									height: 250,
									width: 450,
									modal: true,
									buttons: {
										"حفظ": function() {
											var bValid = true;
											allFields.removeClass( "ui-state-error" );
											
											bValid = bValid && checkIntger( name, "عدد الإيام ");
											if ( bValid ) {
												form = $("#myform");
												$.ajax({
												type: 'POST',
												 url: form.attr('action'),
												data: $('#myform :input').serialize(),
												
												success: function(i)
												{
								                    window.setTimeout(function(){location.reload()},500)

												}
												});
												$( this ).dialog( "close" );
											}
										},
										إلغاء: function() {
											$( this ).dialog( "close" );
										}
									},
									close: function() {
										allFields.val( "" ).removeClass( "ui-state-error" );
									}
								});
									
									$("#add-contracts")
									.click(function() {
										$( "#dialog-add-contracts" ).dialog( "open" );
									});
									
					
				
});
});