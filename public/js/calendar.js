$(function(){
  $('.delete-modal-open').on('click', function () {
    $('.delete-modal').fadeIn();
    var delete_day = $(this).attr('delete_day');
    var delete_part = $(this).attr('delete_part');
    $('.modal_delete_day').text(delete_day);
    $('.modal_delete_part').text(delete_part);
    return false;
  });

  $('.delete-modal-close').on('click', function () {
    $('.delete-modal').fadeOut();
    return false;
  });
});
