<script type="text/javascript" src="/js/bootstrap-filestyle.min.js"></script>
<div id="cropImageModal" style="display:none; width: 680px" class="mdLayer01 md01s cropImgModal">
    <div class="md01sHead">
        <h3><?= Yii::t('frontend', 'Upload image') ?></h3>
    </div>
    <div class="md01sContent clearfix">
        <div class="cropImgBox left">
            <div class="imageBox">
                <div class="thumbBox"></div>
                <div class="spinner" style="display: none">Loading...</div>
            </div>
            <div class="action">
                <input type="file" id="file" style="float:left; width: 250px" class="filestyle" data-buttonText="Chọn ảnh" data-classButton="btn btn-primary">
                <input type="button" id="btnCrop" value="<?= Yii::T('frontend', 'Crop image') ?>" style="float: right">
                <input type="button" id="btnZoomIn" value="+" style="float: right">
                <input type="button" id="btnZoomOut" value="-" style="float: right">
            </div>
            <div style="display:none;" id="userid"><?= Yii::$app->user->id ?></div>
        </div>
        <div class="cropImgBox left">
            <!-- div holder img after crop -->
            <div class="cropped"><img src="/images/avatar_no_image.gif" alt="Avatar"></div>
            <!-- div holder img after crop -->
            <div style="clear:both;">
                <input type="button" name="<?= $btn_name ?>" value="<?= Yii::t('frontend', 'Save image') ?>" class="btn btn_hrbr"/>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/js/cropimg.js"></script>
<script type="text/javascript" src="/js/cropimg_common.js"></script>
<script type="text/javascript" src="/js/CurationSearch.js"></script>
<script type="text/javascript">
    function isIE() {
        var myNav = navigator.userAgent.toLowerCase();
        return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
    }
    function modalWindowCropImg(id) {
        var notice = '';
        if (parseInt(isIE()) <= 8) {
            notice = 'We are not support IE8 and IE9 for this function, please update your browser';
        }
        $('#' + id).modal({
            opacity: 50,
            autoResize: true,
            onShow: function () {
                allCropImg('/images/noimage.jpg', notice);
            },
        });
    }
    $(document).ready(function () {
        var curationsearch = CurationSearch.getInstance();
        $('#CurationImageSearch').on('click', function (e) {
            e.preventDefault();
            $('.AvatarResultList').html('');
            $('#mdAvatarSearch').modal({
                opacity: 50,
                position: [20],
                autoResize: true
            });
        });
    });
</script>