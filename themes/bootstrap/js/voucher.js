// NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
// IT'S ALL JUST JUNK FOR OUR DOCS!
// ++++++++++++++++++++++++++++++++++++++++++

!function ($) {

    $(function(){
        $(this).tooltip({
            selector: "a[rel=tooltip]"
        });
        
        $('#select01').change(function(r){
            var x = $(this).val();
            if(x == 'cancelled'){
                $("#total_pax_cancel").removeClass("disabled");
                $("#total_pax_delay").addClass("disabled");
                $("#total_pax_transfer").addClass("disabled");
                
                $("#total_pax_cancel").removeAttr("disabled", "disabled");
                $("#total_pax_delay").attr("disabled", "disabled");
                $("#total_pax_transfer").attr("disabled", "disabled");
                
                $("#total_pax_delay").val('');
                $("#total_pax_transfer").val('');
            }else{
                $("#total_pax_delay").removeClass("disabled");
                $("#total_pax_transfer").removeClass("disabled");
                $("#total_pax_cancel").addClass("disabled");
                
                $("#total_pax_delay").removeAttr("disabled");
                $("#total_pax_transfer").removeAttr("disabled");
                $("#total_pax_cancel").attr("disabled", "disabled");
                $("#total_pax_cancel").val("");
            
            }
        });
        
        $(".save-manifest").click(function(){
            var id = $(this).attr('rel-data');
            var url = $(this).attr('href');
            
            
            
            var name = $("#name-"+id).val();
            var ticket = $("#ticket-"+id).val();
            var remark = $("#remark-"+id).val();
            var data = {
                name: name,
                ticket: ticket,
                remark: remark
            };

            $.post(url,data,function(r){
                if(r.success){
                    $(this).addClass("disabled");
                    $(this).html("saved");
                    $(".cc").removeClass('alert-error');
                    $("#row-"+id).addClass('alert-success');
                    $(".error-"+id).html('&nbsp;');
                    
                }else{
                    $(".error-"+id).html('<p class="alert-warning"><small>'+r.data+'</small></p>');
                    $(".cc").removeClass('alert-error');
                    $("#row-"+id).addClass('alert-error');
                }
            },'json')
            
            return false;
            
        })
        
        //-------------------------------------------------------
        /*shows the loading div every time we have an Ajax call*/
        $("#loading").bind("ajaxSend", function(){
            $(this).show();
        }).bind("ajaxComplete", function(){
            $(this).hide();
        });
    //-------------------------------------------------------
        
    });
}(window.jQuery)