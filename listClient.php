<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" name="searchForm">
        <input name="keyword" id="keyword" type="text" placeholder="Search by name..">
        <button type="submit">Search</button>
    </form>
    <table id="content">

    </table>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        function loadData() {
            $.ajax({
                url:'http://127.0.0.1:8000/api/tests/listAll',
                method: 'get',
                success: function (responseData) {
                    var data = responseData.data;
                    alert(responseData.message);
                    var contentHTML = `<tr>
                            <th>product_code</th>
                            <th>name</th>
                            <th>price</th>
                            <th>avatar</th>
                            </tr>`;
                    data.forEach(element => {
                        contentHTML += `
                        <tr>
                        <th>${element.product_code}</th>
                        <th>${element.name}</th>
                        <th>${element.price}</th>
                        <th>${element.avatar}</th>
                        </tr>
                        `;
                    })
                    $('#content').html(contentHTML);
                },
                error:function (error) {
                    alert(error);
                }
            });
        }
        loadData();

        // search Database, nếu ko phải seedData thì đã xong rồi
        $('form[name=searchForm]').submit(function (event) {
            var inputKeyword = $('input[name=keyword]');
            // đảm bảo dữ liệu sẽ gửi đi nhưng sẽ không chạy đến đường dẫn, tức là ở nguyên tại chỗ
            event.preventDefault();
            let data = {
                keyword: inputKeyword.val(),
            };
            $.ajax({
                url:'http://127.0.0.1:8000/api/tests/search',
                method: 'POST',
                // data: JSON.stringify(data),
                data: data,
                success : function (responseData) {
                    var data = responseData.data;
                    alert(responseData.message);
                    var contentHTML = `<tr>
                            <th>product_code</th>
                            <th>name</th>
                            <th>price</th>
                            <th>avatar</th>
                            </tr>`;
                    data.forEach(element => {
                        contentHTML += `
                        <tr>
                        <th>${element.product_code}</th>
                        <th>${element.name}</th>
                        <th>${element.price}</th>
                        <th>${element.avatar}</th>
                        </tr>
                        `;
                    })
                    $('#content').html(contentHTML);
                },
                error:function ($xhr,textStatus,errorThrown) {
                    // alert('something error');
                    console.log("ERROR : ", errorThrown);
                    console.log("ERROR : ", $xhr);
                    console.log("ERROR : ", textStatus);
                }
            });
        });
    });
</script>
</html>