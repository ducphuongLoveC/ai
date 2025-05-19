// Validate forms
function validateContactForm() {
	var name = document.contactForm.name;
	var email = document.contactForm.email;
	var phone = document.contactForm.phone;
	var message = document.contactForm.message;
	if (validateName(name, "Tên") && validateEmail(email)
		&& validatePhone(phone) && validateLength(message, 'Tin nhắn', 500)) {
		alert("Thông tin liên lạc của bạn là HỢP LỆ! Cảm ơn bạn");
		return true;
	}
	return false;
}

function validateSignupForm() {
	var lname = document.signupForm.lname;
	var fname = document.signupForm.fname;
	var email = document.signupForm.email;
	var phone = document.signupForm.phone;
	var address = document.signupForm.address;
	var password = document.signupForm.password;
	var pass_cfm = document.signupForm.password_confirmation;
	if (validateName(lname, "Họ") && validateName(fname, "Tên")
		&& validateEmail(email) && validatePhone(phone) && validateNotEmpty(address, "Địa chỉ")
		&& validateSignupPassword(password) && validateConfirmPassword(pass_cfm, password.id)) {
		alert("Tài khoản đã được tạo thành công!");
		return true;
	}
	return false;
}

function validateLoginForm() {
	var email = document.loginForm.email;
	var password = document.loginForm.password;
	if (validateEmail(email) && validateNotEmpty(password, "Mật khẩu")) {
		return true;
	}
	return false;
}

function validateBannerForm() {
	var name = document.bannerForm.name;
	var priority = document.bannerForm.priority;
	var image = document.bannerForm.image;
	if (validateNotEmpty(name, 'Banner name')
		&& validateInt(priority, 'Priority') && validateFile(image)) {
		return true;
	}
	return false;
}

function validateProductForm() {
	var name = document.productForm.name;
	var image = document.productForm.image;
	var price = document.productForm.price;
	var sale_price = document.productForm.sale_price;
	var quantity = document.productForm.quantity;

	if (validateNotEmpty(name, 'Tên sản phẩm') && validateFile(image)
		&& validateFloat(price, "Giá") && validateSalePrice(sale_price)
		&& validateInt(quantity, 'Số lượng')) {
		return true;
	}
	return false;
}

function validateBannerEditForm() {
	var name = document.bannerForm.name;
	var priority = document.bannerForm.priority;
	if (validateNotEmpty(name, 'Tên biểu ngữ')
		&& validateInt(priority, 'Sự ưu tiên')) {
		return true;
	}
	return false;
}

function validateProductEditForm() {
	var name = document.productForm.name;
	var price = document.productForm.price;
	var sale_price = document.productForm.sale_price;
	var quantity = document.productForm.quantity;

	if (validateNotEmpty(name, 'Tên sản phẩm')
		&& validateFloat(price, "Giá") && validateSalePrice(sale_price)
		&& validateInt(quantity, 'Số lượng')) {
		return true;
	}
	return false;
}

function validateCategoryForm() {
	var name = document.categoryForm.name;
	var priority = document.categoryForm.priority;

	if (validateNotEmpty(name, 'Tên danh mục')
		&& validateInt(priority, 'Sự ưu tiên')) {
		return true;
	}
	return false;
}

function validateCheckoutForm() {
	var fname = document.checkoutForm.fname;
	var lname = document.checkoutForm.lname;
	var email = document.checkoutForm.email;
	var phone = document.checkoutForm.phone;
	var address = document.checkoutForm.address;

	if (validateName(fname, 'Tên') && validateName(lname, 'Họ') && validateEmail(email)
		&& validatePhone(phone) && validateNotEmpty(address, 'Địa chỉ')) {
		return true;
	}
	return false;
}

function validateProfileForm() {
	var fname = document.profileForm.fname;
	var lname = document.profileForm.lname;
	var email = document.profileForm.email;
	var phone = document.profileForm.phone;
	var address = document.profileForm.address;
	var curPass = document.profileForm.current_password;

	if (validateName(fname, 'Tên') && validateName(lname, 'Họ')
		&& validateEmail(email) && validateNotEmpty(curPass, 'Mật khẩu')
		&& validatePhone(phone) && validateNotEmpty(address, 'Địa chỉ')) {
		return true;
	}
	return false;
}

function validatePasswordUpdateForm() {
	var curPass = document.passwordUpdateForm.current_password;
	var newPass = document.passwordUpdateForm.new_password;
	var newPass_cfm = document.passwordUpdateForm.new_confirm_password;

	if (validateNotEmpty(curPass, 'Mật khẩu hiện tại') && validatePassword(newPass)
		&& validateConfirmPassword(newPass_cfm, newPass.id)) {
		return true;
	}
	return false;
}

function validateReviewProductForm() {
	var rating = document.reviewProductForm.rating;
	var content = document.reviewProductForm.content;

	if (validateRating(rating, 'xếp hạng') && validateLength(content, 'Đánh giá của bạn', 500)) {
		return true;
	}
	return false;
}

function validateAddAccountForm() {
	var fname = document.addAccountForm.fname;
	var lname = document.addAccountForm.lname;
	var email = document.addAccountForm.email;
	var phone = document.addAccountForm.phone;
	var address = document.addAccountForm.address;
	var password = document.addAccountForm.password;
	var pass_cfm = document.addAccountForm.password_confirmation;

	if (validateName(fname, 'Tên') && validateName(lname, 'Họ')
		&& validateEmail(email) && validatePhone(phone)
		&& validateNotEmpty(address, 'Địa chỉ') && validatePassword(password)
		&& validateConfirmPassword(pass_cfm, password.id)) {
		return true;
	}
	return false;
}

function validateCouponForm() {
	var id = document.couponForm.id;
	var coupon_value = document.couponForm.coupon_value;
	var used_times = document.couponForm.used_times;

	if (validateNotEmpty(id, 'Tên phiếu giảm giá') && validateFloat(coupon_value, 'Giảm giá')
		&& validateInt(used_times, 'Sử dụng có sẵn')) {
		return true;
	}
	return false;
}

// Validate inputs
function validateNotEmpty(input, input_type) {
	if (input.value.length == 0) {
		document.getElementById(input.id + "-err").innerHTML = input_type + " không được để trống!";
		document.getElementById(input.id + "-err").className = 'required-error';
		document.getElementById(input.id).className = 'form-control required-error';
		input.focus();
		return false;
	} else {
		document.getElementById(input.id + "-err").innerHTML = "";
		document.getElementById(input.id).className = "form-control";
		return true;
	}
}

function validateName(name, name_type) {
	var nameLength = name.value.length;
	var letters = /^[A-Za-z '\u00A1-\uFFFF]+$/;
	if (nameLength == 0) {
		document.getElementById(name.id + "-err").innerHTML = name_type + " không được để trống!";
		document.getElementById(name.id + "-err").className = 'required-error';
		document.getElementById(name.id).className = 'form-control required-error';
		name.focus();
		return false;
	} else if (!name.value.match(letters)) {
		document.getElementById(name.id + "-err").innerHTML = name_type + " chỉ được chứa các chữ cái!";
		document.getElementById(name.id + "-err").className = 'invalid-error';
		document.getElementById(name.id).className = 'form-control invalid-error';
		name.focus();
		return false;
	} else {
		document.getElementById(name.id + "-err").innerHTML = "";
		document.getElementById(name.id).className = "form-control";
		return true;
	}
}

function validateEmail(email) {
	var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	var emailLength = email.value.length;
	if (email.value.match(mailformat)) {
		document.getElementById(email.id + "-err").innerHTML = "";
		document.getElementById(email.id).className = "form-control";
		return true;
	} else if (emailLength == 0) {
		document.getElementById(email.id + "-err").innerHTML = "Email không được để trống";
		document.getElementById(email.id + "-err").className = 'lỗi bắt buộc';
		document.getElementById(email.id).className = 'form-control required-error';
		email.focus();
		return false;
	} else {
		document.getElementById(email.id + "-err").innerHTML = "Email có định dạng KHÔNG HỢP LỆ. Ví dụ: abcd@gmail.com";
		document.getElementById(email.id + "-err").className = 'invalid-error';
		document.getElementById(email.id).className = 'form-control invalid-error';
		email.focus();
		return false;
	}
}

function validatePhone(phone) {
	var phoneFormat = /^[0][0-9]{9}$/;
	var phoneLength = phone.value.length;
	if (phone.value.match(phoneFormat)) {
		document.getElementById(phone.id + "-err").innerHTML = "";
		document.getElementById(phone.id).className = 'form-control';
		return true;
	} else if (phoneLength == 0) {
		document.getElementById(phone.id + "-err").innerHTML = "Số điện thoại không được để trống";
		document.getElementById(phone.id + "-err").className = 'required-error';
		document.getElementById(phone.id).className = 'form-control required-error';
		phone.focus();
		return false;
	} else {
		document.getElementById(phone.id + "-err").innerHTML = "Số điện thoại NÊN có độ dài 10 số và bắt đầu bằng số 0";
		document.getElementById(phone.id + "-err").className = 'invalid-error';
		document.getElementById(phone.id).className = 'form-control invalid-error';
		phone.focus();
		return false;
	}
}

function validateLength(message, msg_name, maxLength) {
	var msgLength = message.value.length;
	if (msgLength == 0) {
		document.getElementById(message.id + "-err").innerHTML = msg_name + " không được để trống";
		document.getElementById(message.id + "-err").className = 'required-error';
		document.getElementById(message.id).className = 'form-control required-error';
		message.focus();
		return false;
	} else if (msgLength > maxLength) {
		document.getElementById(message.id + "-err").innerHTML = msg_name + " không được vượt quá " + maxLength + " kí tự";
		document.getElementById(message.id + "-err").className = 'invalid-error';
		document.getElementById(message.id).className = 'form-control invalid-error';
		message.focus();
		return false;
	} else {
		document.getElementById(message.id + "-err").innerHTML = "";
		document.getElementById(message.id).className = 'form-control';
		return true;
	}
}

function validatePassword(password) {
	if (password.value.length < 8) {
		document.getElementById(password.id + "-err").innerHTML = "Mật khẩu phải có ít nhất 8 ký tự!";
		document.getElementById(password.id + "-err").className = 'invalid-error';
		document.getElementById(password.id).className = 'form-control invalid-error';
		password.focus();
		return false;
	} else {
		document.getElementById(password.id + "-err").innerHTML = "";
		document.getElementById(password.id).className = 'form-control';
		return true;
	}
}

function validateConfirmPassword(pass_cfm, pass_id) {
	var psw = document.getElementById(pass_id).value;
	if (psw.localeCompare(pass_cfm.value) != 0) {
		document.getElementById(pass_cfm.id + "-err").innerHTML = "2 mật khẩu không khớp. Hãy thử lại.";
		document.getElementById(pass_cfm.id + "-err").className = 'invalid-error';
		document.getElementById(pass_cfm.id).className = 'form-control invalid-error';
		pass_cfm.focus();
		return false;
	} else {
		document.getElementById(pass_cfm.id + "-err").innerHTML = "";
		document.getElementById(pass_cfm.id).className = 'form-control';
		return true;
	}
}

function validateFile(file) {
	var fileLength = file.files.length;
	if (fileLength == 0) {
		document.getElementById(file.id + "-err").innerHTML = "Bạn phải chọn một tập tin!";
		document.getElementById(file.id + "-err").className = 'invalid-error';
		document.getElementById(file.id).className = 'form-control invalid-error';
		return false;
	} else {
		document.getElementById(file.id + "-err").innerHTML = "";
		document.getElementById(file.id).className = 'form-control';
		return true;
	}
}

function validateInt(int, int_title) {
	var int_val = parseInt(int.value, 10);
	if (int.value.length == 0) {
		document.getElementById(int.id + "-err").innerHTML = int_title + " giá trị không được để trống!";
		document.getElementById(int.id + "-err").className = 'required-error';
		document.getElementById(int.id).className = 'form-control required-error';
		int.focus();
		return false;
	} else if (int_val <= 0) {
		document.getElementById(int.id + "-err").innerHTML = int_title + " giá trị phải lớn hơn 0!";
		document.getElementById(int.id + "-err").className = 'invalid-error';
		document.getElementById(int.id).className = 'form-control invalid-error';
		int.focus();
		return false;
	} else {
		document.getElementById(int.id + "-err").innerHTML = "";
		document.getElementById(int.id).className = 'form-control';
		return true;
	}
}

function validateFloat(float, float_title, min) {
	var float_val = parseFloat(float.value, 10);
	if (float.value.length == 0) {
		document.getElementById(float.id + "-err").innerHTML = float_title + " giá trị không được để trống!";
		document.getElementById(float.id + "-err").className = 'required-error';
		document.getElementById(float.id).className = 'form-control required-error';
		float.focus();
		return false;
	} else if (float_val < min) {
		document.getElementById(float.id + "-err").innerHTML = float_title + " giá trị phải ít nhất là " + min + "!";
		document.getElementById(float.id + "-err").className = 'invalid-error';
		document.getElementById(float.id).className = 'form-control invalid-error';
		float.focus()
		return false;
	} else {
		document.getElementById(float.id + "-err").innerHTML = "";
		document.getElementById(float.id).className = 'form-control';
		return true;
	}
}

function validateSalePrice(salePrice, price_id) {
	var price_val = parseInt(document.getElementById(price_id).value, 10);
	var salePrice_val = parseInt(salePrice.value, 10);

	if (salePrice_val > price_val) {
		document.getElementById(salePrice.id + "-err").innerHTML = "Giá bán không được cao hơn giá gốc!";
		document.getElementById(salePrice.id + "-err").className = 'invalid-error';
		document.getElementById(salePrice.id).className = 'form-control invalid-error';
		salePrice.focus();
		return false;
	} else if (salePrice_val < 0) {
		document.getElementById(salePrice.id + "-err").innerHTML = "Giá bán không được thấp hơn 0$!";
		document.getElementById(salePrice.id + "-err").className = 'invalid-error';
		document.getElementById(salePrice.id).className = 'form-control invalid-error';
		salePrice.focus();
		return false;
	} else {
		document.getElementById(salePrice.id + "-err").innerHTML = "";
		document.getElementById(salePrice.id).className = 'form-control';
		return true;
	}
}

function validateRating(rating, rateId) {
	if (rating.value == "") {
		document.getElementById(rateId + "-err").innerHTML = "Bạn phải đưa ra đánh giá của mình!";
		document.getElementById(rateId + "-err").className = 'invalid-error';
		return false;
	} else {
		document.getElementById(rateId + "-err").innerHTML = "";
		return true;
	}
}