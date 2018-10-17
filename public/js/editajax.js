/*          Reference text box javascript            */

function newRefEmail()
{
    $("#reference_id").change(function(){
      var id = $(this).find("option:selected").attr("id");
      
    //   alert(id);
    
      switch (id){
        case "other_email":
          $("#enter_new_email").show();
          $(".password").hide();
          break;
        
        case undefined:
          $("#enter_new_email").hide();
          $(".password").show();
          break;
      }
    });
}

/*          Reference text box javascript            */

/*      Edit Model jquery by Noor        */

function userView() {
    $(document).on({
        'click':function(){
            var user_id=$(this).data('id');
            var update_url = location.origin+'/user/'+user_id;
            var url=location.origin+'/user/'+user_id+'/edit';
            
            $('.update_user_class').attr({'action': window.location.origin+'/user/'+user_id});
            
            $.get(url,function(data){
              $('#edit_name').val(data['name']);
              $('#edit_email').val(data['email']);
              $('#edit_designation').val(data['designation']);
              $('#edit_department').val(data['department']);
              $('#edit_country').val(data['country']);
              $('#edit_branch').val(data['branch']);
            //   $('.update_user_class').action(update_url);
              
              var country = data['country'];
              
              $("#edit_country > option").each(function() {
                  if($(this).val() === country)
                  {
                      $(this).attr('selected', true);
                  }
              });
              
              $('#country_i_manage option').removeAttr('selected');
              
              $('#country_i_manage option[value="'+data['country_i_manage']+'"]').attr({'selected': 'selected'})
              
              var value = data['role_id'];
              $( "#edit_role_list > option" ).each(function() {
                if( parseInt($(this).val()) === parseInt(value) )
                    {
                      $(this).attr('selected', true);
                    }
                });
            });
        },
    },'.edit_id');
}

/*      Edit Model jquery by Noor        */

/*      Delete User model jquery by Noor    */

function deleteUser() {
    $(document).on({
        'click':function(){
            var user_id=$(this).data('id');
            var url=location.origin+'/user/'+user_id;
            $('.edit_user_class').attr('action',url);
        },
    },'.delete_id');
}

//Sumon: new method role

function roleView() {
   /* $('#editRole').click(function(e){
        e.preventDefault();
    })*/
    $(document).on({
        'click':function(e){
            e.preventDefault();
            var role_id=$(this).data('id');
            var updateUrl=location.origin+'/roles/'+role_id;
            var url=location.origin+'/roles/'+role_id+'/edit';
             $.get(url,function(data){
              $('[name="edit_name"]').val(data['name']);
             $('[name="edit_role_from"]').attr('action',updateUrl);
            });
        },
    },'.editRole');
}
function deleteRole() {
    $(document).on({
        'click':function(){
            var role_id=$(this).data('id');
            var url=location.origin+'/roles/'+role_id;
            $('.delete_role_class').attr('action',url);
        },
    },'.delete_role');
}

$(document).ready(function() {
    
   // edit user
   if($('.edit_id').length >0){
       userView();
   }
   //delete_user
   if($('.delete_id').length >0){
       deleteUser();
   }
   //edit role
    if($('#editRole').length >0){
       roleView();
   }
   //delete Role
   if($('.delete_role').length >0){
       deleteRole();
   }
   
   if($('#other_email').length >0){
       newRefEmail();
   }
   
});