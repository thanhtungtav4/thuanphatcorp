<style type="text/css">
    
    @import url(https://fonts.googleapis.com/css?family=Sigmar+One);
@import url(https://fonts.googleapis.com/css?family=Poiret+One);
 
body {
  background-image:url('http://localhost/thuanphatcorp/404.png');
  background-attachment:fixed;
  background-size:cover;
  background-color: #222;
  margin:0px;
  padding:0px;
  overflow:hidden;
  font-family: 'Poiret One', cursive;
}
 
h1
{
  font-size:200px;
  width:100vw;
  text-align:center;
 
  color:rgba(0,255,0,1);
  font-family: 'Poiret One', cursive;
 
}
 
span
{
  cursor:move;
}
 
.underline
{
  font-size:50px;
  color:white;
  text-align:center;
}
 
.button
{
  font-size:50px;
  color:white;
 
  font-family: 'Poiret One', cursive;
 
  text-align:center;
}
 
.button span
{
  cursor:pointer;
  padding:10px;
 
  border-style:solid;
  border-radius:5px;
 
  transition:border-color 0.75s;
  -webkit-transition:border-color 0.75s;
}
 
.button span:hover
{
border-color:rgb(0,255,0);
}
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://localhost/thuanphatcorp/jGravity-min.js"></script>
<script>
$(function() {
$(document).ready(function() {
  var one =false;
 
   $('.button span').mouseover(function(){
    if(!one){
                $('body').jGravity({
               target: 'span',
               ignoreClass: 'dontMove',
               weight: 25,
               depth: 100,
               drag: true
             });
        one =true;
       };
   });
 
});
});
</script>
<div class='underline'>
      <span>Xin Lỗi</span><span>, </span><span>Trang </span><span>Bạn </span><span>Muốn Vào </span><span></span><span></span><span>Không tồn tại</span>
    </div>
 
    <h1><span>4</span><span>0</span><span>4</span></h1>
 
    <div class='button'><a title='put your link here'><span>Join the survivors</span></a></div>
    