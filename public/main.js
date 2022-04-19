document.addEventListener('DOMContentLoaded', function() { 
  confirmElements = document.querySelectorAll('[data-confirm]')

  confirmElements.forEach(function(element) {
    message = element.dataset.confirm
    form = element.closest('form')

    if(form != undefined) {
      form.addEventListener('submit', function(event){
        event.preventDefault();

        if(confirm(message)) {
          form.submit();
        }
      })
    }
  })
});
