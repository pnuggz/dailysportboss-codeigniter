/**
 * Created by RIZZ-ASUS on 20/04/2016.
 */

$('#leagues_id).hide();
$('#sports_id').change(function(){
    var state_id = $('#sports_id').val();
    if (state_id != ""){
        var post_url = "/index.php/control_form/get_cities/" + sports_id;
        $.ajax({
            type: "POST",
            url: post_url,
            success: function(sports) //we're calling the response json array 'cities'
            {
                $('#leagues_id').empty();
                $('#leagues_id').show();
                $.each(sports,function(id,sport_name)
                {
                    var opt = $('<option />'); // here we're creating a new select option for each group
                    opt.val(id);
                    opt.text(sport_name);
                    $('#leagues_id').append(opt);
                });
            } //end success
        }); //end AJAX
    } else {
        $('#leagues_id').empty();
        $('#leagues_id').hide();
    }//end if
}); //end change
