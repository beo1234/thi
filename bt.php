   <? php
      include_once (" config.php ");
      $ result = mysqli_query ( $ mysqli , " CHỌN * TỪ LỆNH của tbl_studien THEO id DESC ");
    ?>


    < html >
   < body >

    < style >
        cơ thể {
            phông chữ - họ : Arial , sans - serif ;
        td {
            justify-content : trung tâm;
            text-align : center;

        }
        td  a {
            màu sắc : đen;
            văn bản-trang trí : không có;
            con trỏ : con trỏ;
        }
        . hàng {
            hiển thị : flex;
            flex-wrap : bọc;
        }
        . thùng chứa {

            margin : tự động;
        }
        / * hộp tìm kiếm định dạng * /
        . hộp tìm kiếm {
          chiều rộng :  300 px ;
          chức vụ : thân nhân;
          display: inline-block;
          font-size: 14px;
        }
        .search-box input[type="text"]{
            height: 32px;
            padding: 5px 10px;
            border: 1px solid #CCCCCC;
            font-size: 14px;
        }
        .result{
            position: absolute;
            z-index: 999;
            top: 100%;
            left: 0;
        }
        .search-box input[type="text"],.result{
            width: 100%;
            box-sizing: border-box;
        }
        /* formatting result items */
        .result p{
            margin: 0;
            padding: 7px 10px;
            border: 1px solid #CCCCCC;
            border-top: none;
            cursor: pointer;
        }
        . kết quả  p : hover {
            nền :  # f2f2f2 ;
        }
        . trái {
            chiều rộng :  25 % ;
        }
        . đúng {
            chiều rộng :  75 % ;
        }
    </ style >
    < script  src = " https://code.jquery.com/jquery-3.5.1.min.js " > </ script >
 < script  src = " https://code.jquery.com/jquery-3.5.1.min.js " > </ script >
    < script >
        $ ( tài liệu ) . sẵn sàng ( function ( ) {
            $ ( '.search-box input [type = "text"]' ) . on ( "keyup input" ,  function ( ) {
                /*get input values on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if(inputVal.length){
                    $.get("backend.php", {term: inputVal}).done(function(data){
                        //display the return data in browser
                        resultDropdown.html(data);
                    });
                }else {
                    resultDropdown.empty();
                }
            });
            //set search input value on click of result item
            $(document).on("click", ".result p", function(){
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            } )
        } )
    </ script >
</ head >
< body >
    < div  class = " search-box " >
         < label  for = " search " > Tìm kiếm </ label >
         < input  type = " text "  autocomplete = " off "  id = " search "  placeholder = " Tìm kiếm sinh viên ... " />
         < div  class = " result " > </ div >
    </ div >
</ body >

        </ div >


       < div  class = "" >
       <a style = "color: black;" href = "create.php"> Tạo Studient < / a  > _
        <br> _ _
        <br> _ _

        < table  width = '95% ' ;  border = 1 >
            < tr >
                < th > Tên </ th >
                < th > Tuổi </ th >
                < th > Địa chỉ </ th >
                < th > Điện thoại </ th >
                < th > Tùy chọn </ th >
            </ tr >
            <? php

        while ( $ stu_data = mysqli_fetch_array ( $ result )) {
            echo  '<tr>' ;
            echo  '<td>' . $ stu_data [ 'name' ]. '</td>' ;
            echo  '<td>' . $ stu_data [ 'tuổi' ]. '</td>' ;
            echo  '<td>' . $ stu_data [ 'địa chỉ' ]. '</td>' ;
            echo  '<td>' . $ stu_data [ 'điện thoại' ]. '</td>' ;
            echo " <td> <a href='edit.php?id= $ stu_data [id]'> Chỉnh sửa </a> |
            <a href='delete.php?id= $ stu_data [id]'> Xóa </a> </td> ";
            echo  '</tr>' ;
        }
        ?>
       </ div >
  </ div >