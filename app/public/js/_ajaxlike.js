$(function () {
  var like = $('.js-like-toggle');
  var likeProductId;
  
  like.on('click', function () {
      var $this = $(this);
      likeProductId = $this.data('productid');
      $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: '/add_like',  //routeの記述
              type: 'POST', //受け取り方法の記述（GETもある）
              data: {
                  'product_id': likeProductId //コントローラーに渡すパラメーター
              },
      })
  
          // Ajaxリクエストが成功した場合
          .done(function (data) {
  //lovedクラスを追加
              // $this.toggleClass('loved'); 

              // var imgSrc = $this.hasClass('loved') ? "{{ asset('image/liked.png') }}" : "{{ asset('image/likes.png') }}";
              // $this.find('img').attr('src', imgSrc);
  
  //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
            //    $this.next('.likesCount').html(data.productLikesCount); 
            if(data.status === "unliked"){
              $this.css("color","gray");
            }else if(data.status === "liked"){
              $this.css("color","red");
            }
  
          })
          // Ajaxリクエストが失敗した場合
          .fail(function (data, xhr, err) {
  //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
  //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
              console.log('エラー');
              console.log(err);
              console.log(xhr);
          });
      
      return false;
  });
  });