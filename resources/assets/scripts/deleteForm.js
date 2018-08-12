$(document).ready(function () {
    $('table[data-form="deleteForm"]').on('click', '.form-button-delete', function(e){
        e.preventDefault();
        var $form=$(this);
        $('#confirm').modal({ backdrop: 'static', keyboard: false })
            .on('click', '#delete-btn', function(){
                if (typeof $form.submit === "function") { 
                    console.log('function yeah');
                    $form.submit();
                    console.log($form);
                }
                console.log('begin submit');
                $form.submit();
                console.log('end submit');
            });
    });
});