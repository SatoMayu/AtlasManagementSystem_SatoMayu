$(function(){
  $('.delete-modal-open').on('click', function () {
    $('.delete-modal').fadeIn();
    // ↓ここでの$thisは親要素$delete-modal-open
    // ↓CalendarView.phpで記述したdelete_day属性をattrでvar変数に格納(var delete_dayはphpでいうところの$delete_day)
    var delete_day = $(this).attr('delete_day');
    var delete_part = $(this).attr('delete_part');
    var delete_part_val = $(this).attr('delete_part_val');
    // ↓取得したdelete_dayのデータをモーダルの中へ渡す
    $('.modal_delete_day').text(delete_day);
    $('.modal_deleteDay').val(delete_day);
    $('.modal_delete_part').text(delete_part);
    $('.modal_deletePart').val(delete_part_val);

    return false;
  });

  $('.delete-modal-close').on('click', function () {
    $('.delete-modal').fadeOut();
    return false;
  });
});
