(function($) {        
    jQuery("#entry-form").submit(function(e) {
        e.preventDefault(); 
       
        let first_name = $(".first_name").val();
        let last_name = $(".last_name").val();
        let email = $(".email").val();
        let phone = $(".phone").val();
        let description = $(".description").val();
        let competition_id = $(".competition_id").val();
        
        jQuery.ajax({
            method:'POST',
            url: OBJ.ajaxurl, 
            data: {
                
                'action':'entry_submission_into_competition',
                'first_name' : first_name, // This is the variable we are sending via AJAX
                'email' : email, // This is the variable we are sending via AJAX
                'last_name' : last_name ,// This is the variable we are sending via AJAX
                'phone' : phone, // This is the variable we are sending via AJAX
                'description' : description, // This is the variable we are sending via AJAX
                'competition_id' : competition_id, // This is the variable we are sending via AJAX
                'entry_nonce' : OBJ.nonce
            },
            success:function(data) {
                 // This outputs the result of the ajax request (The Callback)    
                  jQuery("#displayName").text( data + ', Your entry is submitted.' );       
                  jQuery(".msg").css( 'display','block' );       
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
        });
})( jQuery );