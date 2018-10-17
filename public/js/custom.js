
function add_tmsf_id() {
    $(document).on({
        'click':function(){
            var data=$(this).data('id');
            $('[name="tmsf_id"]').val(data);
            var url=location.origin+'/ajax-attentdie/'+data;
            $('[name="follow_up_list[]"]').html('<option value="">-Please Select-</option>');
            
            $.get(url,function(data){
                $(data.users).each(function(k,v){
                  $('[name="follow_up_list[]"]').append('<option value="'+v.id+'">'+v.name+'</option>');
                });
            });
            
        },
    },'#btn_setup_meeting,#btn_add_followup,#btn_employee_client');
}

function loadAgreementTemplate(){
    $(document).on({
        'keyup change':function(){
            var client_id=$(this).val();
            var url=location.origin+'/ajax-agreement/'+client_id;
              $.get(url,function(data){
               //console.log(data.agreement_type);
               $('#load_agreement_tmp').html(data.agreement_body);
               $('[name="agreement_body"]').summernote('code',data.agreement_body);
              });
              $('[name="agreement_title"]').val(client_id);
              
        }
    },'[name="agreement_type"]');
}

function loadNdaTemplate(){
    $(document).on({
        'keyup change':function(){
            var client_id=$(this).val();
            var url=location.origin+'/ajax-nda/'+client_id;
              $.get(url,function(data){
               //console.log(data.agreement_type);
               $('#load_agreement_tmp').html(data.nda_body);
               $('[name="agreement_body"]').summernote('code',data.nda_body);
              });
              $('[name="agreement_title"]').val(client_id);
              
        }
    },'[name="nda_type"]');
}

function add_client_employee_tr(){
    $('.add_client_employee').click(function(e){
        e.preventDefault();
         var tr= '';
         tr="<tr class=\"employee_list\">";
          tr+="<td>";
          tr+="<i class=\"fa fa-trash btn btn-danger delete_row\"></i>";
          tr+="</td><td>";
          tr+="<input type=\"text\" name=\"skill_set[]\" class=\"form-control\" required/>";
          tr+="</td><td>";
          tr+="<select name=\"level[]\" class=\"form-control\">";          
          tr+="<option value=\"Beginner\">Beginner</option>";          
          tr+="<option value=\"Mid\">Mid</option>";   
          tr+="<option value=\"Advanced\">Advanced</option>";
          tr+="</select>";  
          tr+="</td><td>";
          tr+="<input type=\"text\" name=\"quentity[]\" class=\"form-control\" required/>";                  
          tr+="</td><td>";
          tr+="<select name=\"category[]\" class=\"form-control\">";          
          tr+="<option value=\"Supervisor\">Supervisor</option>";          
          tr+="<option value=\"Team Member\">Team Member</option>";          
          tr+="</select>";          
          tr+="</td>";            
          tr+="</tr>"; 
          if($('.client_employee tbody tr:last-child').length>0){
          $('.client_employee tbody tr:last-child').after(tr);
          }else{
             $('.client_employee tbody').append(tr); 
          }
    });
}

function delete_employee_tr(){
    $(document).on({
         click: function(e){
         e.preventDefault();
         $(this).parent().parent().remove();
       }
    },'.delete_row');
}

function delete_follow_up_row(){
    $(document).on({
         click: function(e){
         e.preventDefault();
         $(this).parent().parent().remove();
       }
    },'.delete_follow_up_row');
}

function delete_table_row(){
    $(document).on({
         click: function(e){
         e.preventDefault();
         $(this).parent().parent().remove();
       }
    },'.delete_table_row');
}

$(document).ready(function(){
    
    add_tmsf_id();
    loadAgreementTemplate();
    loadNdaTemplate();
    add_client_employee_tr();
    delete_employee_tr();
    delete_follow_up_row();
    delete_table_row();
    
    // Add 'actives' class to left active menu item
    $('.menubar li:has(a[href="'+window.location.href+'"])').addClass('actives');
    
    // Enable tooltip on any item
    $('[data-toggle="tooltip"]').tooltip();
    
    $(document).on({
        click: function(e){
         e.preventDefault();
          var data=$('#follow_up_id_html').html();
            data+="<div class=\"col-xs-12 col-sm-5 \">";
            data+="<div class=\"form-group no-margin-left-right\">";
            data+="<textarea class=\"form-control custom-form-control\" rows=\"1\" name=\"follow_up_comments[]\" required=\"\" placeholder=\"Comments\"></textarea>";
            data+="</div></div>";
            data+="<div class=\"col-xs-1\"><i class=\"fa fa-trash btn btn-danger delete_follow_up_row new-margin\"></i></div>";
          var second=$('.follow_up_class').append('<div class="demo">'+data+'</div>');
          second.find('.follow_pick_time').timepicker({minuteStep: 1});
          second.find('.follow_pick_date').datepicker();
      }
    },'#add_follow_up_btn');
    
    $(document).on({
        change: function(e){
         e.preventDefault();
          $('.physical_meeting').hide();
          $('.virtual_meeting').hide();
        // console.log()
         if($(this).val()==="Physical Meeting"){
           $('.physical_meeting').show();
         }
         if($(this).val()==="Virtual"){
           $('.virtual_meeting').show();
         }
       }
    },'[name="edit_meeting_type"]');
    
    $(document).on({
        change: function(e){
         e.preventDefault();
          $('.physical_meeting').hide();
          $('.virtual_meeting').hide();
        // console.log()
         if($(this).val()==="Physical Meeting"){
           $('.physical_meeting').show();
         }
         if($(this).val()==="Virtual"){
           $('.virtual_meeting').show();
         }
       }
    },'[name="meeting_type"]');
    
    $(document).on({
        click: function(e){
         e.preventDefault();
        var meeting_id=$(this).data('id');
        var url=location.origin+'/get-meeting/'+meeting_id;
          $.get(url,function(data){               
                //console.log(data);
                //$('name="meeting_time_zone"');
                $("[name=edit_meeting_time_zone] option[value='"+data.meeting_time_zone+"']").attr({'selected':true});
                $('[name="edit_meeting_date"]').val(data.meeting_date);
                
                $("[name=edit_meeting_type] option[value='"+data.meeting_type+"']").attr({'selected':true});
                
                if(data.meeting_type==="Virtual"){
                    $('.virtual_meeting').show();
                    $("[name=edit_meeting_address] option[value='"+data.meeting_address+"']").attr({'selected':true});
                }
                if(data.meeting_type==="Physical Meeting"){
                    $('.physical_meeting').show();
                    $("[name=edit_physical_meeting_address]").val(data.meeting_address);
                }
            
            $('[name="edit_meeting_time"]').val(data.meeting_time);

            $('[name="edit_meeting_time"]').timepicker({defaultTime: 'value'});
            // $('[name="edit_meeting_time"]').timepicker({defaultTime: data.meeting_time});
            $('[name="edit_comments"]').val(data.comments);
            $('[name="meeting_id"]').val(meeting_id);
            
            var aten= data.users;
            $('#tokenize').tokenize().clear();
            $.each(aten, function( index, value ) {
                $('#tokenize').tokenize().tokenAdd(value.id, value.name);
           });
        });
                
       }
    },'#btn_edit_meeting');
    
    $('.custom-btn').click(function(){
        $('.demo').parents('.custom-nav-tabs').children('li').removeClass('active');
        var data=$(this).data('btn-id');
         $(".tabs_ul_"+data).parent().addClass('active');
         $('.tab-pane').removeClass('active');
         $(".tab_content_"+data).addClass('active');
    });
    $(document).on({
        click: function(e){
         e.preventDefault();
            var tr= '';
            tr="<tr><td>";
            tr+="<i class=\"fa fa-trash btn btn-danger delete_table_row new-margin\"></i><input type=\"text\" name=\"item[]\"class=\"form-control delete-design\" placeholder=\"Item Name\"/>";
            tr+="</td>";
            tr+="<td><input type=\"text\" name=\"qty[]\" class=\"form-control\"/></td>";
            tr+="<td><input type=\"text\" name=\"starting_date[]\" class=\"form-control\"/></td>";
            tr+="<td><input type=\"text\" name=\"deadline[]\" class=\"form-control\"/></td>";
            tr+="<td><input type=\"text\" name=\"notes[]\" class=\"form-control\"/></td>";
            tr+="</tr>";
          
             if($('.tableBody tr:last-child').length>0){
             $('.tableBody tr:last-child').after(tr);
             $('.tableBody').find('[name="starting_date[]"]').datepicker();
             $('.tableBody').find('[name="deadline[]"]').datepicker();
             }else{
                $('.tableBody').append(tr);
                $('.tableBody').find('[name="starting_date[]"]').datepicker();
                $('.tableBody').find('[name="deadline[]"]').datepicker();
             }  
         
       }
    },'#infa_id');
    
    /*Noor*/
    // $(document).on({
    //     click: function(e){
    //      e.preventDefault();
    //         var div= '';
            
    //         div="<div id=\"follow_up_id\">";
    //         div+="<div class=\"col-xs-12 col-sm-3\">";
    //         div+="<div class=\"form-group no-margin-left-right\">";
    //         div+="<select class=\"form-control custom-form-control\" name=\"follow_up_list[]\"><option>--Please Select--</option><option value=\"Tia Denesik\">Tia Denesik</option><option value=\"Vaughan Randall\">Vaughan Randall</option><option value=\"asdf\">asdf</option><option value=\"asdf\">asdf</option></select>";
    //         div+="</div></div>";
    //         div+="<div class=\"col-xs-12 col-sm-3\">";
    //         div+="<div class=\"form-group no-margin-left-right\">";
    //         div+="<input type=\"text\" required=\"\" class=\"form-control custom-form-control\" name=\"next_action_list[]\" placeholder=\"Next Action Next\">";
    //         div+="</div></div>";
    //         div+="<div class=\"col-xs-12 col-sm-3\">";
    //         div+="<div class=\"form-group no-margin-left-right\">";
    //         div+="<input type=\"text\" required=\"\" class=\"form-control custom-form-control\" name=\"reminder_topics[]\" placeholder=\"Reminder Topics\">";
    //         div+="</div></div>";
    //         div+="<div class=\"col-xs-12 col-sm-3\">";
    //         div+="<div class=\"form-group no-margin-left-right\">";
    //         div+="<select class=\"form-control custom-form-control\" name=\"reminder_via[]\">";
    //         div+="<option>--Reminder Via--</option>";
    //         div+="<option value=\"Official Email\">Official Email</option>";
    //         div+="<option value=\"Persional Email\">Persional Email</option>";
    //         div+="</select></div></div>";
    //         div+="<div class=\"col-xs-12 col-sm-3\">";
    //         div+="<div class=\"form-group no-margin-left-right\">";
    //         div+="<input type=\"text\" required=\"\" class=\"form-control custom-form-control follow_pick_date\" name=\"follow_pick_date[]\">";
    //         div+="</div></div>";
    //         div+="<div class=\"col-xs-12 col-sm-3\">";
    //         div+="<div class=\"form-group no-margin-left-right\">";
    //         div+="<input type=\"text\" class=\"form-control custom-form-control follow_pick_time\" required=\"\" name=\"follow_pick_time[]\">";
    //         div+="<input type=\"hidden\" name=\"tmsf_id\" value=\"13\">";
    //         div+="</div></div>";
    //         div+="<div class=\"col-xs-12 col-sm-6 shortening\">";
    //         div+="<div class=\"form-group no-margin-left-right\">";
    //         div+="<textarea class=\"form-control custom-form-control\" rows=\"1\" name=\"follow_up_comments[]\" required=\"\" placeholder=\"Comments\"></textarea>";
    //         div+="</div></div>";
    //         div+="<div class=\"\"><i class=\"fa fa-trash btn btn-danger delete_follow_up_row new-margin\"></i></div></div>";
            
    //         $('.follow_up_class').append(div);
            
    //   }
    // },'#add_follow_up_btn');
    /*Noor*/
    
    $(document).on({
        click: function(e){
         e.preventDefault();
        var tr= '';
        tr="<tr><td>";
        tr+="<input type=\"text\" name=\"item[]\"class=\"form-control\" placeholder=\"Item Name\"/>";
        tr+="</td>";
        tr+="<td><input type=\"text\" name=\"qty[]\" class=\"form-control\"/></td>";
        tr+="<td><input type=\"text\" name=\"starting_date[]\" class=\"form-control\"/></td>";
        tr+="<td><input type=\"text\" name=\"deadline[]\" class=\"form-control\"/></td>";
        tr+="<td><input type=\"text\" name=\"notes[]\" class=\"form-control\"/></td>";
        tr+="<input type=\"hidden\" name=\"group_id[]\" value=\"2\"/>"
        tr+="</tr>";
      
         if($('.tableBodyTwo tr:last-child').length>0){
         $('.tableBodyTwo tr:last-child').after(tr);
         $('.tableBodyTwo').find('[name="starting_date[]"]').datepicker();
         $('.tableBodyTwo').find('[name="deadline[]"]').datepicker();
         }else{
            $('.tableBodyTwo').append(tr); 
            $('.tableBodyTwo').find('[name="starting_date[]"]').datepicker();
            $('.tableBodyTwo').find('[name="deadline[]"]').datepicker();
         }     
         
       }
    },'#network');
    $(document).on({
        click: function(e){
         e.preventDefault();
         var tr= '';
         tr="<tr><td>";
         tr+="<input type=\"text\" name=\"item[]\"class=\"form-control\" placeholder=\"Item Name\"/>";
         tr+="</td>";
         tr+="<td><input type=\"text\" name=\"qty[]\" class=\"form-control\"/></td>";
         tr+="<td><input type=\"text\" name=\"starting_date[]\" class=\"form-control\"/></td>";
         tr+="<td><input type=\"text\" name=\"deadline[]\" class=\"form-control\"/></td>";
         tr+="<td><input type=\"text\" name=\"notes[]\" class=\"form-control\"/></td>";
         tr+="<input type=\"hidden\" name=\"group_id[]\" value=\"3\"/>"
         tr+="</tr>";
      
          if($('.tableBodyThree tr:last-child').length>0){
          $('.tableBodyThree tr:last-child').after(tr);
          $('.tableBodyThree').find('[name="starting_date[]"]').datepicker();
          $('.tableBodyThree').find('[name="deadline[]"]').datepicker();
          }else{
             $('.tableBodyThree').append(tr);
             $('.tableBodyThree').find('[name="starting_date[]"]').datepicker();
             $('.tableBodyThree').find('[name="deadline[]"]').datepicker();
          }   
         
       }
    },'#admin');
    $(document).on({
        click: function(e){
         e.preventDefault();
            var tr= '';
            tr="<tr><td>";
            tr+="<input type=\"text\" name=\"item[]\"class=\"form-control\" placeholder=\"Item Name\"/>";
            tr+="</td>";
            tr+="<td><input type=\"text\" name=\"qty[]\" class=\"form-control\"/></td>";
            tr+="<td><input type=\"text\" name=\"starting_date[]\" class=\"form-control\"/></td>";
            tr+="<td><input type=\"text\" name=\"deadline[]\" class=\"form-control\"/></td>";
            tr+="<td><input type=\"text\" name=\"notes[]\" class=\"form-control\"/></td>";
            tr+="<input type=\"hidden\" name=\"group_id[]\" value=\"4\"/>"
            tr+="</tr>";
          
             if($('.tableBodyFour tr:last-child').length>0){
             $('.tableBodyFour tr:last-child').after(tr);
             $('.tableBodyFour').find('[name="starting_date[]"]').datepicker();
             $('.tableBodyFour').find('[name="deadline[]"]').datepicker();
             }else{
                $('.tableBodyFour').append(tr);
                $('.tableBodyFour').find('[name="starting_date[]"]').datepicker();
             $('.tableBodyFour').find('[name="deadline[]"]').datepicker();
             } 
         
       }
    },'#core_team');
    $(document).on({
        click: function(e){
         e.preventDefault();
            var tr= '';
            tr="<tr><td>";
            tr+="<input type=\"text\" name=\"item[]\"class=\"form-control\" placeholder=\"Item Name\"/>";
            tr+="</td>";
            tr+="<td><input type=\"text\" name=\"qty[]\" class=\"form-control\"/></td>";
            tr+="<td><input type=\"text\" name=\"starting_date[]\" class=\"form-control\"/></td>";
            tr+="<td><input type=\"text\" name=\"deadline[]\" class=\"form-control\"/></td>";
            tr+="<td><input type=\"text\" name=\"notes[]\" class=\"form-control\"/></td>";
            tr+="<input type=\"hidden\" name=\"group_id[]\" value=\"5\"/>"
            tr+="</tr>";
      
         if($('.tableBodyFive tr:last-child').length>0){
         $('.tableBodyFive tr:last-child').after(tr);
         $('.tableBodyFive').find('[name="starting_date[]"]').datepicker();
         $('.tableBodyFive').find('[name="deadline[]"]').datepicker();
         }else{
            $('.tableBodyFive').append(tr);
            $('.tableBodyFive').find('tr td').datepicker();
            $('.tableBodyFive').find('[name="starting_date[]"]').datepicker();
         $('.tableBodyFive').find('[name="deadline[]"]').datepicker();
         }    
         
       }
    },'#account');
   
//     $('#account').click(function(e){
//       e.preventDefault();
//         var tr= '';
//         tr="<tr><td>";
//         tr+="<input type=\"text\" name=\"item[]\"class=\"form-control\" placeholder=\"Item Name\"/>";
//         tr+="</td>";
//         tr+="<td><input type=\"text\" name=\"qty[]\" class=\"form-control\"/></td>";
//         tr+="<td><input type=\"text\" name=\"starting_date[]\" class=\"form-control\"/></td>";
//         tr+="<td><input type=\"text\" name=\"deadline[]\" class=\"form-control\"/></td>";
//         tr+="<td><input type=\"text\" name=\"notes[]\" class=\"form-control\"/></td>";
//         tr+="<input type=\"hidden\" name=\"group_id[]\" value=\"5\"/>"
//         tr+="</tr>";
      
//          if($('.tableBodyFive tr:last-child').length>0){
//          $('.tableBodyFive tr:last-child').after(tr);
//          }else{
//             $('.tableBodyFive').append(tr); 
//          }
// });
    $('[name="agreement_body"]').summernote({
        height: 200, 
      });
    $(document).on('click', '.panel div.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
//========================================================//
// Ajax request show Serrvice pack when select country 
//=======================================================//
$(document).on({
    'keyup change':function(){
        var country_name=$(this).val();
        var url=location.origin+'/country_list/'+country_name;
          $.get(url,function(data){
            var datapack=$('[name="pack[]"]').html("<option value=\"\">--Please Select--</option>");
            $(data).each(function(k,v){
              $('[name="pack[]"]').append('<option value="'+v.id+'">'+v.pack_name+'</option>');
            }); 
            
          });
    }
    
},'[name="country"]');

});

