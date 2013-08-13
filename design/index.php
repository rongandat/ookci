<?php include_once 'header.php'; ?>
<div class="blue_horz"></div>
<div class="container">
    <div style="float:left;margin-right:12px;">
        <a title="" href="#" class="large greybutton"><span style="color: #000;">Đăng Nhập</span></a>
    </div>
    <div style="float:left;margin-right:12px;">
        <a title="Đăng Ký MIỄN PHÍ" href="#" class="large mybutton"><span style="color:#cc0001;">Đăng Ký</span> MIỄN PHÍ</a>
    </div>
    <div style="float:left; margin-top:-5px; width:465px;">
        <div style="color:#CC0000; font-size:18px; font-weight:bold;">Nhiều Việc Làm Nhất</div>
        <span style="color:#CC0000; font-size:15px; font-weight:bold;">»</span><b> Nhận Việc Làm Phù Hợp Qua Email</b>
        <span style="color:#CC0000; font-size:15px; font-weight:bold; padding-left:10px;">»</span><b> Ứng Tuyển Dễ Dàng</b>
    </div>
    <a title="JobStreet Chính Sách Bảo Mật" href="#"><img border="0" align="right" height="36" width="131" src="http://www.jobstreet.vn/hpstc/default/common/img/truste.gif" style="float:right;"></a>
    <div class="clear"></div>
    <div class="search_bg">
        <div style="float:left; width:930px;">
            <form name="frmSearch" id="frmSearch" method="get" action="#">
                <div title="Tìm Tất Cả Việc Làm in Vietnam" class="px14 dark_background" style="padding-bottom:3px;">
                    <a href="#"><u><b>Tìm Tất Cả Việc Làm (3,567 Việc Làm)</b></u></a>
                </div>
                <div id="qsKey">
                    <input type="text" class="input ac_input blur" id="key" name="key" title="Nhập chức danh, vị trí làm việc …" value="Nhập chức danh, vị trí làm việc …" style="width:270px;" autocomplete="off">&nbsp;
                </div>
                <div id="qsLoc">
                    <select id="location" name="location">
                        <option value="">Tất cả địa điểm</option>
                        <optgroup label="Các thành phố hàng đầu">
                            <option class="opt-indent" value="110122">Hà Nội</option>
                            <option class="opt-indent" value="110127">Hồ Chí Minh</option>
                        </optgroup>
                        <optgroup label="Việt Nam">
                            <option class="opt-indent" value="110101">An Giang</option>
                            <option class="opt-indent" value="110102">Bà Rịa - Vũng Tàu</option>
                            <option class="opt-indent" value="110103">Bắc Cạn</option>
                            <option class="opt-indent" value="110104">Bắc Giang</option>
                            <option class="opt-indent" value="110105">Bạc Liêu</option>
                            <option class="opt-indent" value="110106">Bắc Ninh</option>
                            <option class="opt-indent" value="110107">Bến Tre</option>
                            <option class="opt-indent" value="110162">Biên Hòa</option>
                            <option class="opt-indent" value="110108">Bình Định</option>
                            <option class="opt-indent" value="110109">Bình Dương</option>
                            <option class="opt-indent" value="110110">Bình Phước</option>
                            <option class="opt-indent" value="110111">Bình Thuận</option>
                            <option class="opt-indent" value="110112">Cà Mau</option>
                            <option class="opt-indent" value="110113">Cần Thơ</option>
                            <option class="opt-indent" value="110114">Cao Bằng</option>
                            <option class="opt-indent" value="110115">Đà Nẵng</option>
                            <option class="opt-indent" value="110116">Đắc Lắc</option>
                            <option class="opt-indent" value="110163">Điện Biên</option>
                            <option class="opt-indent" value="110117">Đồng Nai</option>
                            <option class="opt-indent" value="110118">Đồng Tháp</option>
                            <option class="opt-indent" value="110119">Gia Lai</option>
                            <option class="opt-indent" value="110120">Hà Giang</option>
                            <option class="opt-indent" value="110121">Hà Nam</option>
                            <option class="opt-indent" value="110122">Hà Nội</option>
                            <option class="opt-indent" value="110123">Hà Tây</option>
                            <option class="opt-indent" value="110124">Hà Tĩnh</option>
                            <option class="opt-indent" value="110125">Hải Dương</option>
                            <option class="opt-indent" value="110126">Hải Phòng</option>
                            <option class="opt-indent" value="110127">Hồ Chí Minh</option>
                            <option class="opt-indent" value="110128">Hòa Bình</option>
                            <option class="opt-indent" value="110164">Huế</option>
                            <option class="opt-indent" value="110129">Hưng Yên</option>
                            <option class="opt-indent" value="110130">Khánh Hòa</option>
                            <option class="opt-indent" value="110131">Kiên Giang</option>
                            <option class="opt-indent" value="110132">Kon Tum</option>
                            <option class="opt-indent" value="110133">Lai Châu</option>
                            <option class="opt-indent" value="110134">Lâm Đồng</option>
                            <option class="opt-indent" value="110135">Lạng Sơn</option>
                            <option class="opt-indent" value="110136">Lào Cai</option>
                            <option class="opt-indent" value="110137">Long An</option>
                            <option class="opt-indent" value="110138">Nam Định</option>
                        </optgroup>
                    </select>
                </div>
                <div id="qsSpe">
                    <select id="specialization" name="specialization">
                        <option value="">Tất cả ngành nghề</option>
                        <optgroup label="Kế toán/Tài chính" class="optgroup">
                            <option class="opt-indent" value="130,131,132,135">Tất cả Kế toán/Tài chính</option>
                            <option class="opt-indent" value="130">Kiểm toán &amp; Thuế</option>
                            <option class="opt-indent" value="135">Ngân hàng/Tài chính</option>
                            <option class="opt-indent" value="132">Tài chính/Đầu tư</option>
                            <option class="opt-indent" value="131">Kế toán Tổng hợp/Kế toán Chi phí</option>
                        </optgroup>
                        <optgroup label="Hành chính/Nhân sự" class="optgroup">
                            <option class="opt-indent" value="133,137,146,148">Tất cả Hành chính/Nhân sự</option>
                            <option class="opt-indent" value="133">Thư ký/Quản trị chung</option>
                            <option class="opt-indent" value="137">Nhân sự</option>
                            <option class="opt-indent" value="146">Thư ký</option>
                            <option class="opt-indent" value="148">Quản lý Cấp cao</option>
                        </optgroup>
                        <optgroup label="Nghệ thuật/Viễn thông/Truyền thông" class="optgroup">
                            <option class="opt-indent" value="100,101,106,141">Tất cả Nghệ thuật/Viễn thông/Truyền thông</option>
                            <option class="opt-indent" value="100">Quảng cáo</option>
                            <option class="opt-indent" value="101">Mỹ thuật/Thiết kế Sáng tạo</option>
                            <option class="opt-indent" value="106">Giải trí</option>
                            <option class="opt-indent" value="141">Quan hệ công chúng</option>
                        </optgroup>
                    </select>
                </div>
                <div id="qsPos">
                    <select id="position" name="position">
                        <option value="">Tất cả các cấp bậc</option>
                        <option value="1">Quản lý Cấp cao / CEO / Chủ tịch / Phó Chủ tịch / Giám đốc / Tổng Giám đốc</option>
                        <option value="2">Trưởng phòng</option>
                        <option value="3">Nhân sự Cấp cao / Trưởng nhóm / Giám sát viên</option>
                        <option value="4">Nhân viên</option>
                        <option value="5">Mới tốt nghiệp</option>
                    </select>
                </div>
                <input type="hidden" value="1" name="ss">
                <input type="hidden" value="search" name="by">
                <input type="hidden" value="11" name="src">
            </form>
        </div>
        <div class="clear"></div>
        <div class="dark_background white" style="float:left; position:relative; top:10px;" id="lastsearch">
            <script type="text/javascript" language="javascript">
                if(getMyLastSearchCookie('SEARCH_REMEMBER_LAST'))
                    document.write('Từ Khóa Đã Tìm::&lt;br/&gt; ' + getMyLastSearchCookie('SEARCH_REMEMBER_LAST'));
            </script>
        </div>
        <div class="dark_background" style="float:right; position:relative; right:40px; top:22px;">
            <a title="Tìm Kiếm Nâng Cao" href="#"><u>Tìm Kiếm Nâng Cao</u></a>
        </div>
        <div style="float:right; position:relative; right:55px; top:15px;">
            <a onclick="javascript:if(document.frmSearch.key.value=='Nhập chức danh, vị trí làm việc …') { document.frmSearch.key.value=''; } document.frmSearch.submit();" href="#" class="large mybutton yellow">Tìm Ngay!</a>
        </div>
    </div>
</div>
<div class="clear"></div>

<div class="container">
    <div class="column1">
        <h2>Danh Sách Việc Làm</h2>
        <div class="jobs_bg">
            <div class="jobs_bg_content dark_background">
            </div>
            <ul class="tabs">
                <li class="active"><a title="Việc Làm Theo Chuyên Ngành" href="#specializations">Chuyên Ngành</a></li>
                <li><a title="Việc Làm Theo Địa Điểm" href="#locations">Địa Điểm</a></li>
                <li><a title="Việc Làm Theo Cấp Bậc" href="#positionlevels">Cấp Bậc</a></li>
            </ul>
            <div class="tab_container">
                <div class="tab_content" id="specializations">
                    <div id="spec-left">
                        <span id="spec-header">
                            <a title="" href="">Kế toán / Tài chính</a>
                        </span>
                        <br>
                        <a title="Kế toán Tổng hợp/Kế toán Chi phí" href="#">Kế toán Tổng hợp/Kế toán Chi phí (172)</a>
                        <br>
                        <a title="Ngân hàng/Tài chính" href="">Ngân hàng/Tài chính (43)</a>
                        <br><br>
                    </div>
                    <div id="spec-right">
                        <span id="spec-header">
                            <a title="" href="">Kế toán / Tài chính</a>
                        </span>
                        <br>
                        <a title="Kế toán Tổng hợp/Kế toán Chi phí" href="#">Kế toán Tổng hợp/Kế toán Chi phí (172)</a>
                        <br>
                        <a title="Ngân hàng/Tài chính" href="">Ngân hàng/Tài chính (43)</a>
                        <br><br>
                    </div>
                    <div class="clear"></div>
                </div>
                <div style="display:none" class="tab_content" id="locations">
                    <div class="l">
                        <a title="An Giang" href="#">An Giang (8)</a><br>
                        <a title="Bà Rịa - Vũng Tàu" href="">Bà Rịa - Vũng Tàu (34)</a><br>
                        <a title="Bắc Cạn" href="">Bắc Cạn (1)</a>
                        <br><br>
                    </div>
                    <div class="r">
                        <a title="An Giang" href="#">An Giang (8)</a><br>
                        <a title="Bà Rịa - Vũng Tàu" href="">Bà Rịa - Vũng Tàu (34)</a><br>
                        <a title="Bắc Cạn" href="">Bắc Cạn (1)</a>
                        <br><br>
                    </div>
                </div>
                <div style="display:none" class="tab_content" id="positionlevels">
                    <div class="l">
                        <a title="Quản lý Cấp cao / CEO / Chủ tịch / Phó Chủ tịch / Giám đốc / Tổng Giám đốc" href="#">Quản lý Cấp cao / CEO / Chủ tịch / Phó Chủ tịch / Giám đốc / Tổng Giám đốc (88)</a><br>
                        <br><a title="Trưởng phòng" href="#">Trưởng phòng (643)</a><br>
                        <br><a title="Nhân sự Cấp cao / Trưởng nhóm / Giám sát viên" href="#">Nhân sự Cấp cao / Trưởng nhóm / Giám sát viên (984)</a>
                        <br><br>
                    </div>
                    <div class="r">
                        <a title="Nhân viên" href="#">Nhân viên (1626)</a>
                        <br><br>
                        <a title="Mới tốt nghiệp" href="#">Mới tốt nghiệp (223)</a>
                        <br><br>
                    </div>
                </div>
                <script type="text/javascript">
                           
                    //Curve top border
                    $("ul.tabs li").click(function() {
                        $("ul.tabs li").removeClass("active"); //Remove any "active" class
                        $(this).addClass("active"); //Add "active" class to selected tab
                        $(".tab_content").hide(); //Hide all tab content
                        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
                        $(activeTab).fadeIn(); //Fade in the active content
                        return false;
                    });
                </script>
            </div>
        </div>
        <div class="clear"></div>
        <br>
        <script type="text/javascript">
            $('.blur').focus(function(){
                var strTitle = this.title;
                if(this.value==strTitle){
                    this.value='';
                    $(this).removeClass('blur');
                }
            }).blur(function(){
                var strTitle = this.title;
                if(this.value==''){
                    this.value=strTitle;
                    $(this).addClass('blur');
                }
            });
        </script>
    </div>
    <div class="column2">
        <div class="top_logo">
            <ul class="logo_tab">
                <li id="top_e"><span title="Nhà Tuyển Dụng Hàng Đầu ở Vietnam">Nhà Tuyển Dụng <br> HÀNG ĐẦU</span></li>
            </ul>
            <div class="logo_tab_container">
                <div id="topemployers" class="logo_tab_content">
                    <table border="0" id="topemployers">
                        <tbody>
                            <tr>
                                <td>
                                    <a href="#" title="DHL">
                                        <img border="0" src="http://www.jobstreet.vn/banner/2013/dhl_te.gif">
                                    </a>
                                </td>
                                <td>
                                    <a href="#" title="Robert Bosch Vietnam Co., Ltd">
                                        <img border="0" src="http://www.jobstreet.vn/banner/2012/Bosch_te.gif">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" title="DHL">
                                        <img border="0" src="http://www.jobstreet.vn/banner/2013/dhl_te.gif">
                                    </a>
                                </td>
                                <td>
                                    <a href="#" title="Robert Bosch Vietnam Co., Ltd">
                                        <img border="0" src="http://www.jobstreet.vn/banner/2012/Bosch_te.gif">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" title="DHL">
                                        <img border="0" src="http://www.jobstreet.vn/banner/2013/dhl_te.gif">
                                    </a>
                                </td>
                                <td>
                                    <a href="#" title="Robert Bosch Vietnam Co., Ltd">
                                        <img border="0" src="http://www.jobstreet.vn/banner/2012/Bosch_te.gif">
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="column3">
        <div class="banners">

            <script src="http://banners-sg.jobstreet.com/banner/java.asp?id=2122" type="text/javascript" language="javascript"></script>


        </div>
    </div>
</div>
<div class="clear"></div>
<?php include_once 'footer.php'; ?>