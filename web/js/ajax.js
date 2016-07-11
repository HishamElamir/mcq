
            function notify() {
                $(document).ready(function () {
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: '<?php echo Yii::$app->request->baseUrl . '/index.php?r=teacher/notification/index&id=11' ?>',
                        success: function (data) {


                            var unRead = data.unReadIds;
                            var notifys = data.notifications;
                            var teacher = data.teacher;
                            var student = data.student;

                            $('#notifications-body').html('');
                            for (i = 0; i < notifys.length; i++) {
                                var group = notifys[i].group;
                                var text = notifys[i].text;
                                var exam = notifys[i].exam;
                                var notifyId = notifys[i].id;

                                // alert(exam.name);

                                $('#notifications-body').append('<li>'
                                        + '<ul class="menu">'
                                        + '<li>'
                                        + '<a href="#">'
                                        + '<div class="pull-left">'
                                        + '</div>'
                                        + '<h4 id = "">'
                                        + teacher.displayname +
                                        +'<small><i class="fa fa-clock-o"></i>' + '5 mins' + '</small>'
                                        + '</h4>'
                                        + '<p>' + 'my Student (' + student.displayname + ') ' + text + ' (' + exam.name + ')</p>'
                                        + '</a>'
                                        + '</li>'
                                        + '</ul>'
                                        + '</li>');
                            }


                            var ids = [];
                            for (i = 0; i < unRead.length; i++) {

                                ids[i] = unRead[i].id;

                            }
                            setRead(ids);

                        }

                    });
                });
            }

            function setRead(ids) {

                $.ajax({
                    url: '<?php echo Yii::$app->request->baseUrl . '/index.php?r=teacher/notification/set-read' ?>',
                    type: 'post',
                    data: {notifyIds: ids},
                    success: function (data) {
                        var notifyIcon = $('#notif_numbers');
                        if (data === 1) {
                            notifyIcon.removeClass('label-danger');
                            notifyIcon.addClass('label-success');
                            notifyIcon.css("color", "none");
                        }
                        //alert(data);
                    }

                });

            }

            function countNotifications() {
                $.ajax({
                    type: 'GET',
                    // dataType: 'json',
                    url: '<?php echo Yii::$app->request->baseUrl . '/index.php?r=teacher/notification/count-notifications&id=11' ?>',
                    success: function (data) {
                        var notifyIcon = $('#notif_numbers');
                        if (data > 0) {
                            notifyIcon.removeClass('label-success');
                            notifyIcon.addClass('label-danger');
                            notifyIcon.css("color", "red !important");
                            notifyIcon.html(data);
                        }
                        else {
                            notifyIcon.removeClass('label-danger');
                            notifyIcon.addClass('label-success');
                            notifyIcon.css("color", "none");
                        }

                        //alert(data);

                    }

                });

            }



            setInterval(countNotifications, 500);