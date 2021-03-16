
    function ajaxCall() {
        this.send = function(data, url, method, success, type) {
          type = type||'json';
          var successRes = function(data) {
              success(data);
          };

          var errorRes = function(e) {
              console.log(e);
              //alert("Error found \nError Code: "+e.status+" \nError Message: "+e.statusText);
          };
            $.ajax({
                url: url,
                type: method,
                data: data,
                success: successRes,
                error: errorRes,
                dataType: type,
                timeout: 60000
            });

          }

        }

function locationInfo() {
    var rootUrl = "api.php";
    var call = new ajaxCall();
    

    this.getStates = function(id) {
        $(".states option:gt(0)").remove(); 
        $(".cities option:gt(0)").remove(); 
        var url = rootUrl+'?type=getStates&countryId=' + id;
        var method = "post";
        var data = {};
        $('.states').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            $('.states').find("option:eq(0)").html("Select State");
            if(data.tp == 1){
                $.each(data['result'], function(key, val) {
                    var option = $('<option />');
                    option.attr('value', key).text(val);
                    $('.states').append(option);
                });
                $(".states").prop("disabled",false);
            }
           
        }); 
    };

    this.getCountries = function() {
        var url = rootUrl+'?type=getCountries';
        var method = "post";
        var data = {};
        $('.countries').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            $('.countries').find("option:eq(0)").html("Select Country");
            console.log(data);
            if(data.tp == 1){
                $.each(data['result'], function(key, val) {
                    var option = $('<option />');
                    option.attr('value', key).text(val);
                    $('.countries').append(option);
                });
                $(".countries").prop("disabled",false);
            }
            
        }); 
    };

}

$(function() {
var loc = new locationInfo();
loc.getCountries();
 $(".countries").on("change", function(ev) {
        var countryId = $(this).val();
        var countryText = $(".countries option:selected").text();
        $("#country_v2").val(countryText);
        if(countryId != ''){
        loc.getStates(countryId);
        }
        else{
            $(".states option:gt(0)").remove();
        }
    });
 $(".states").on("change", function(ev) {
        //var stateId = $(this).val();
        var stateText = $(".states option:selected").text();
        $("#state_v2").val(stateText);
    });
});