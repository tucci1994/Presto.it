let swiper = new Swiper(".mySwiper", {
  pagination: {
    el: ".swiper-pagination",
    type: "progressbar",
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

$(function(){
  if($("#drophere").length > 0){
    let csrfToken = $('meta[name="csrf-token"]').attr('content');
    let uniqueSecret = $('input[name="uniqueSecret"]').attr('value');

    let myDropzone = new Dropzone('#drophere',{
      url: '/announcement/images/upload',

      params: {
        _token: csrfToken,
        uniqueSecret: uniqueSecret,
      },
      addRemoveLinks: true,
    });

    init: (function(){
      $.ajax({
          type: 'GET',
          url: '/announcement/images',
          data: {
            uniqueSecret: uniqueSecret
          },
          dataType: 'json'
      }).done(function(data){
          $.each(data, function(key, value){
            let file = {
              serverId: value.id
            };
          myDropzone.options.addedfile.call(myDropzone, file);
          myDropzone.options.thumbnail.call(myDropzone, file, value.src);
          })
      });
    })

    myDropzone.on("success", function(file, response){
      file.serverId = response.id;
    });

    myDropzone.on("removedfile", function(file){
      $.ajax({
        type: 'DELETE',
        url: '/announcement/images/delete',
        data: {
          _token: csrfToken,
          id: file.serverId,
          uniqueSecret: uniqueSecret
        },
        dataType: 'json'
      });
    })
  }
})

function getSelectedChild(element) {
  const selectedInput = $(element).find("input:checked")
  if (selectedInput[0]) {
      return $(element).find("input:checked")[0].value
  }
  return ''
}

function buildURI() {
  const selectedCategoryId = getSelectedChild('#filters-container')
  const selectedOrder = getSelectedChild('#order-container')
  const selectedPrice = getSelectedChild('#price-container')

  const queryParams = new URLSearchParams({
      category_id: selectedCategoryId,
      order: selectedOrder,
      price: selectedPrice
  })
  const {protocol, host, pathname} = window.location;
  return protocol + '//' + host + pathname + '?' + queryParams.toString();
}

$('#filters-container').on('change', function(){
  window.location.replace(buildURI())
})

$('#order-container').on('change', function(){
  window.location.replace(buildURI())
})

$('#price-container').on('change', function(){
window.location.replace(buildURI())
})



function buildURIHome(categoryId) {
  
  const {protocol, host, pathname} = window.location;
  return protocol + '//' + host + '/announcement' + '/all' + '?category_id=' + categoryId ;
}

$('.card-category').on('click', function(){
  const categoryId = this.getAttribute('data-category');
  
  window.location.replace(buildURIHome(categoryId))
})
