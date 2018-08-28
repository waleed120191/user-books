<div class="bg-light">

    <div class="container-fluid-1">
        <div class="row">
            <div class="col-xl-12">
                <button onclick="$('#add_user_form_container').toggle( 'slow' );" class="btn btn-dark">Add user</button>
            </div>
        </div>
    </div>

    <div class="container-fluid-2" id="add_user_form_container" style="display: none;">
        <div class="row bg-dark">
            <div class="col-xl-12">

                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'add_user_form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // See class documentation of CActiveForm for details on this,
                    // you need to use the performAjaxValidation()-method described there.
                    'enableAjaxValidation' => true,
                    'htmlOptions' => array(
                        'class' => 'container-fluid-2',
                        'onsubmit' => 'return addUser();',
                        'name' => 'add-user-form'
                    ),
                )); ?>


                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+</span>
                            </div>
                            <?php echo $form->dropDownList($model, 'salutation', ['' => 'Salutation *', 'mr' => 'Mr', 'mrs' => 'Mrs'], ['class' => 'form-control', 'placeholder' => 'salutation *', 'required' => 'required']); ?>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+</span>
                            </div>
                            <?php echo $form->textField($model, 'title', ['class' => 'form-control', 'placeholder' => 'Title']); ?>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+</span>
                            </div>
                            <?php echo $form->fileField($model, 'image', ['class' => 'form-control']); ?>
                        </div>
                    </div>
                </div>


                <div class="form-row">
                    <div class="col-md-6 mb-4">
                        <div class="input-group pb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend3">+</span>
                            </div>
                            <?php echo $form->textField($model, 'firstname', ['class' => 'form-control', 'placeholder' => 'Firstname *', 'required' => 'required']); ?>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend3">+</span>
                            </div>
                            <?php echo $form->textField($model, 'lastname', ['class' => 'form-control', 'placeholder' => 'Lastname *', 'required' => 'required']); ?>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend3">+</span>
                            </div>
                            <?php echo $form->textArea($model, 'description', ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => '4']); ?>

                        </div>
                    </div>
                </div>

                <div>
                    <button class="btn float-right" type="submit">Save</button>
                    <input type="hidden" name="CSRF_TOKEN" value="<?php echo Yii::app()->request->csrfToken; ?>">
                    <input type="hidden" name="action" value="add">
                    <div class="clearfix"></div>
                </div>


                <?php $this->endWidget(); ?>

                </form>


            </div>

        </div>

    </div>


    <div class="container-fluid-1">
        <div class="row">
            <div class="col-xl-12 align-middle">
                <ul class="list-group">
                    <?php foreach ($users as $user) { ?>
                        <li class="list-group-item bg-light only_border_bottom">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-2 align-middle">
                                        <?php if($user->image){ ?>
                                        <img class="rounded-circle" width="140px" height="140px"
                                             src="<?php echo Yii::app()->request->baseUrl."/uploads/users/".$user->image; ?>" />
                                        <?php } else{ ?>
                                            <img class="rounded-circle" width="140px" height="140px"
                                                 src="<?php echo Yii::app()->request->baseUrl."../assets/img/noPhotoFound.png"; ?>" />
                                        <?php } ?>
                                    </div>
                                    <div class="col-xl-3 align-middle">
                                        <h4><?php echo $user->firstname . ' ' . $user->lastname; ?></h4>

                                    </div>
                                    <div class="col-xl-2 align-middle">
                                        <h4>Books : <?php echo count($user->books); ?></h4>

                                    </div>
                                    <div class="col-xl-4 align-middle">
                                        <ul>
                                            <?php
                                            $booksListToExclude = CHtml::listData($user->books, 'id', 'title');
                                            foreach ($user->books as $book) { ?>
                                                <li class="bg-light"><?php echo $book->title . ' - ' . $book->author; ?></li>
                                            <?php } ?>
                                        </ul>

                                        <?php echo CHtml::dropDownList('bookslist_' . $user->id, '',
                                            array_diff_key($books, $booksListToExclude), ['class' => 'form-control hide-it', 'onChange' => 'assignBook(this)', 'data-user' => $user->id]);
                                        ?>

                                    </div>

                                    <div class="col-xl-1 align-middle">
                                        <a href="javascript::void(0)" onclick="$('#<?php echo 'bookslist_' . $user->id; ?>').toggle()"><i
                                                    class="fa fa-plus fa-3x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid-1 float-right">
        <?php $this->widget('CLinkPager', array(
            'pages' => $pages,
        )) ?>
    </div>
    <div class="clearfix"></div>


</div>

<script>
    function addUser() {
        var form = document.forms.namedItem("add-user-form");
        var formData = new FormData(form);


        $.ajax({
            method: "POST",
            url: '<?php echo Yii::app()->createAbsoluteUrl("v2/user/ajax"); ?>',
            data: formData,
            cache: false,
            contentType: false, //must, tell jQuery not to process the data
            processData: false,
        })
            .done(function (data) {
                data = $.parseJSON(data);
                alert(data.msg);
                // TODO : data.status can be used and we can create request from client to server which only updates user listing part.

                location.reload();
            }).fail(function (jqXHR, textStatus){
            alert(textStatus);
        });

        return false;
    }

    function assignBook(ele){
        var book = $(ele).val();
        var user_id = $(ele).data('user');

        if(book == '')
            return;

        $.ajax({
            method: "POST",
            url: '<?php echo Yii::app()->createAbsoluteUrl("v2/user/ajax"); ?>',
            data: {'action' : 'assignBook', 'user_id' : user_id, 'book_id' : book },
        })
            .done(function (data) {
                data = $.parseJSON(data);
                alert(data.msg);
                // TODO : data.status can be used and we can create request from client to server which only updates user listing part.

                location.reload();
            })
        .fail(function (jqXHR, textStatus){
            alert(textStatus);
        });
    }
</script>

