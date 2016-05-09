$(function(){
    var selected_unit= '?';

    var units=[];

        $.getJSON('http://hygienspelet.se/unit/all' ,function(jd) {
            if (jd.length === 0) {
                console.log("Empty JSON");
            }

            else {
                console.log(jd);



                for (var i = 0; i < jd.length; i++) {
                    
                    var item = jd[i];
                    var id = item.ID;
                    var name= item.Name;
                    console.log(item+' '+id+ ' '+name);
                    units.push({value: name, data:id});


                    console.log(units[i]);


                }



            }
        })
  
  // setup autocomplete function pulling from currencies[] array
  $('#autocomplete').autocomplete({
    lookup: units,
    onSelect: function (suggestion) {
      var thehtml = '<strong>Vald avdelning:</strong> ' + suggestion.value + ' <br> <strong>Förkortning:</strong> ' + suggestion.data;
      $('#outputcontent').html(thehtml);
        lookup: selected_unit = suggestion.value;
        $('#unit').html('Inloggad på: '+selected_unit);

    }
  });

    $('#autocomplete-challenge').autocomplete({
        lookup: units,
        onSelect: function (suggestion) {
            lookup:selected_unit;
            var res = '<h4>'+selected_unit+' <small>VS</small> ' + suggestion.value + ' </h4>' +
                '  <button type="button" class="btn btn-primary">Utmana</button>';
            $('#outputcontent-challenge').html(res);


        }
    });
});