$("#category_id").change(function() {
    $("#subcategory_id").html("");
    //alert($(this).val())
    $.getJSON("include/ajax-show-subcat.php", {
        valuepass: $(this).val()
    }, function(d) {
        console.log(d);
        if (d.length) {
            showsubcat(d);
        }
    })
});
function showsubcat(d){
    let html = '<option value="-1">Sub.Category Select...</option>';
    d.forEach(e => {
        html += '<option value="' + e.id + '">' + e.name + '</option>';
    });
    $("#subcategory_id").html(html);
};