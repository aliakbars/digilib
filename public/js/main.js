$(document).ready(function() {
	var loc = window.location.href.split('/')[5];
	var id = '#nav-' + loc;
	if (id != '#nav-undefined')
		$(id).addClass('active');
	else
		$('#nav-repertoire').addClass('active');

	$("#input-year").keydown(function(event) {
        // Allow: backspace, delete, tab, escape, and enter
        if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
            (event.keyCode == 65 && event.ctrlKey === true) || (event.keyCode >= 35 && event.keyCode <= 39)) {
            // let it happen, don't do anything
        return;
    }
    else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });

    $("#input-title").keyup(function(event) {
        if (this.value.match(/[^a-zA-Z0-9 ().,]/g)) {
            this.value = this.value.replace(/[^a-zA-Z0-9 ().,]/g, '');
        }
    });

    $("#input-composer").keyup(function(event) {
        if (this.value.match(/[^a-zA-Z0-9 ().,]/g)) {
            this.value = this.value.replace(/[^a-zA-Z0-9 ().,]/g, '');
        }
    });

    $("#input-arranger").keyup(function(event) {
        if (this.value.match(/[^a-zA-Z0-9 ().,]/g)) {
            this.value = this.value.replace(/[^a-zA-Z0-9 ().,]/g, '');
        }
    });

    $t = $("body"); // CHANGE it to the table's id you have

    $("#overlay").css({
        opacity : 0.5,
        top     : $t.offset().top + 200,
        width   : $t.outerWidth(),
        height  : $t.outerHeight()
    });

    $("#img-load").css({
        top  : ($t.height()/ 2),
        left : ($t.width() / 2)
    });

    function search() {
        $('#overlay').fadeIn();
        $.ajax({
            type: 'post',
            url: './index.php/repertoire/search',
            data: {
                query: $('#query').val(),
                meta: $('#meta option:selected').text()
            },
            dataType: 'json',
            success: function(result) {
                $('#table').html('');
                $('#warning').removeClass('alert alert-warning').text('');
                if (result.length != 0) {
                    for (var i = 0; i < result.length; i++) {
                        $('#table').append($('<tr>')
                            .append($('<td>').text(i+1))
                            .append($('<td>').append($('<a>').text(result[i]['title']).attr('href','./index.php/repertoire/description/' + result[i]['id'])))
                            .append($('<td>').text(result[i]['composer']))
                            .append($('<td>').text(result[i]['arranger']))
                            .append($('<td>').text(result[i]['format']))
                            .append($('<td>').text(result[i]['tags']))
                            .append($('<td>').text(result[i]['year'])))
                    };
                } else {
                    $('#warning').addClass('alert alert-warning').html("<strong>Oops!</strong> No results found for your query.");
                }
            },
            error: function(result) {
                alert("Error fetching data");
            }
        });
        $('#overlay').fadeOut();
    }

    $('#searchbutton').click(search);

    $("#query").keyup(function(event){
        if(event.keyCode == 13){
            $("#searchbutton").click();
        }
    });

    function login() {
        $.ajax({
            type: 'post',
            url: './auth/login',
            data: {
                username: $('#email').val(),
                password: $('#password').val()
            },
            dataType: 'json',
            success: function(result) {
                if (result == false) {
                    $('#error').addClass('alert alert-error');
                    $('#error').html('Wrong username or password');
                } else {
                    window.location = "./repertoire";
                }
            },
            error: function(result) {
                $('#error').addClass('alert alert-error');
                $('#error').html('Error logging you in');
            }
        });
    }

    $('#submitbutton').click(login);
});

function bfce70fd3bbf2adb4800309d3a03a079e79cee9c(id, title) {
    var sure = confirm("Are you sure you want to delete '" + title + "'?");
    if (sure) {
        window.location = './index.php/repertoire/bfce70fd3bbf2adb4800309d3a03a079e79cee9c/' + id;
    }
}