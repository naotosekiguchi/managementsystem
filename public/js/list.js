function deleteAlert(event) {
   if (!window.confirm('本当に削除しますか？')) {
        window.alert('キャンセルされました'); 
        event.preventDefault();
   }
};
