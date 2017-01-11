var acos = {
        edit: function(url, id){
            $.ajax({
              url: url+'/'+id,
              type: "POST",
              success: function(response){
                $('#aco-edit').html(response);
              }
            });
        },

        toggle: function(url, aco, aro){
            $.ajax({
                url: url+'/'+aco+'/'+aro,
                type: "POST",
                success: function(response){
                    $('#permission-' + aco + '-' + aro).html(response);
                }
            });
        }
}