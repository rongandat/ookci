<?php include_once 'header.php'; ?>
<div class="blue_horz"></div>
<div id="contentWrap">
    <div id="content">
        <div id="loginContent">
            <div class="loginBox">
                <div class="boxTitle">Đăng Nhập</div>
                <form id="login" name="login" method="post">	
                    <div><h1>Tài khoản JobStreet.com</h1></div>
                    <div class="formSection">
                        <div class="body">
                            <div class="space">&nbsp;</div>
                            <div class="pageRow">															
                                <div id="form_error">		
                                    <div id="div_server">
                                        <div class="errorReg">Rất tiếc ID Đăng Nhập hoặc Mật Khẩu chưa chính xác. Vui lòng thử lại.<br>Quên ID Đăng Nhập hoặc Mật Khẩu, <a onclick="javascript:popup_win('http://myjobstreet.jobstreet.vn/home/forgot-password.php?site=vn&amp;language_code=135',570,480);" href="#">hãy lấy lại chúng ở đây</a>.</div>
                                    </div>
                                    <div class="clear"><div style="display:none;" class="errorReg" id="div_login_id"></div></div>
                                    <div class="clear"><div style="display:none;" class="errorReg" id="div_password"></div></div>
                                    <div class="space">&nbsp;</div>
                                </div>					
                            </div>
                            <div class="pageRow">
                                <div class="colLeft">ID Đăng Nhập : </div>
                                <div class="colRow">	
                                    <input type="text" name="login_id" id="login_id" value="" style="width:160px;" maxlength="100">
                                </div>
                            </div>
                            <div class="pageRow lineSpacing">
                                <div class="colLeft">Mật Khẩu : </div>
                                <div class="colRow">
                                    <input type="password" style="width:160px;" id="password" name="password"> &nbsp; <div class="pageRow">&nbsp;</div><a onclick="javascript:popup_win('http://myjobstreet.jobstreet.vn/home/forgot-password.php?site=vn&amp;language_code=135',570,480);" href="#">Quên Mật Khẩu?</a>   
                                </div>
                            </div>	
                            <div class="pageRow">
                                <div class="colLeft">&nbsp;</div>
                                <div class="colRow">								
                                    <a href="http://myjobstreet.jobstreet.vn/home/login.php?df=1&amp;site=vn">Đăng nhập bằng tài khoản khác.</a>										
                                </div>						
                            </div>
                            <div class="pageRow">
                                <div class="colLeft">&nbsp;</div>
                                <div class="colRow">								
                                    <input type="checkbox" value="on" name="remember">Ghi nhớ đăng nhập
                                </div>						
                            </div>
                            <div class="pageRow">
                                <div class="colLeft">&nbsp;</div>
                                <div class="colCol">&nbsp;</div>
                                <div class="colRow">
                                    <input type="submit" onclick="javascript:return onClickSubmit(this);" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Đăng Nhập&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" id="btnLogin" name="btnLogin" class="button">	
                                    <input type="hidden" value="1" name="login">
                                </div>						
                            </div>
                            <div class="pageRow">
                                <div class="colLeft">&nbsp;</div>
                                <div class="colRow">
                                    Chế độ: Chuẩn | <a href="https://myjobstreet.jobstreet.com/home/login.php?site=vn&amp;language_code=135">Bảo mật</a><br>

                                </div>
                            </div>
                            <div class="pageRow">&nbsp;</div>
                        </div>
                    </div>
                    <input type="hidden" value="" id="referer_url" name="referer_url">
                </form>
            </div>
            <div class="memberBox">
                <div class="signup">
                    <div><h1>Thành viên mới? <br> Hãy đăng ký thành viên MIỄN PHÍ ngay! &nbsp;&nbsp;</h1></div><br>
                    <div class="colLeft">
                        <div class="point">•&nbsp;Nhận được việc làm phù hợp thông qua email</div>
                        <div class="point">•&nbsp;Ứng tuyển dễ dàng</div>
                        <div class="point">•&nbsp;Nhiều việc làm nhất</div>
                    </div>
                    <div class="rowButtonCenter">
                        <input type="button" value="Đăng Ký Ngay!" onclick="javascript: return onClickRegister('http://myjobstreet.jobstreet.vn/registration/quick-register.php?site=vn&amp;language_code=135');" id="sign_up" name="sign_up" class="button">			</div>
                </div>
            </div>
        </div>
        <div class="pageRow blur trusteDiv">
            <div class="truste"><a title="Chính Sách Bảo Mật Của JobStreet" target="_blank" href="http://www.jobstreet.vn/aboutus/privacy_policy.htm"><img border="0" height="30" src="http://myjobstreet.jobstreet.vn/myjs11-static/default/common/image/truste.gif"></a></div>
            Tất cả các tài khoản được đảm bảo tính bảo mật và riêng tư tuyệt đối, theo quy định của 
            <a title="Chính Sách Bảo Mật Của JobStreet" target="_blank" href="http://www.jobstreet.vn/aboutus/privacy_policy.htm">
                TRUSTe</a>. Nhà tuyển dụng có thể xem hồ sơ của bạn chỉ khi bạn ứng tuyển cho mẫu tin tuyển dụng hoặc bạn chọn mở hồ sơ cho mọi người xem.
        </div>
        <div class="clear"></div>
    </div>	
</div>
<?php include_once 'footer.php'; ?>