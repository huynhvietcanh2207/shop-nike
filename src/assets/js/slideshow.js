// LẤY ELEMENT
const bigPhoto = document.querySelector('.big-photo');
const thumbnails = document.querySelectorAll('.thumbnail');
let selected;

// Kiểm tra nếu bigPhoto và thumbnails tồn tại
if (bigPhoto && thumbnails.length > 0) {
    // khi chọn vào bức ảnh nhỏ thì bức ảnh lớn sẽ hiện hình bức ảnh nhỏ
    thumbnails.forEach(element => {
        element.addEventListener('click', function () {
            if (selected) {
                selected.classList.remove('active');
            }
            
            element.classList.add('active');
            bigPhoto.setAttribute('src', element.getAttribute('src'));
            selected = this;
        });
    });

    // mỗi 1s sẽ tự động chuyển sang hình kế tiếp và nếu đến hình cuối sẽ chuyển về hình đầu
    let hinhNhoHienTai = thumbnails[0];
    let viTriChonHinhKeTiep = 0;

    function changeTimeout() {
        viTriChonHinhKeTiep++; // vị trí hình nhỏ kế tiếp tự tăng lên 1

        // Kiểm tra out of bounds
        if (viTriChonHinhKeTiep == thumbnails.length) {
            viTriChonHinhKeTiep = 0; // chuyển về vị trí ban đầu
        }

        // Tô màu vị trí kế tiếp
        bigPhoto.setAttribute('src', thumbnails[viTriChonHinhKeTiep].getAttribute('src')); // thay hình lớn bằng hình nhỏ kế tiếp
        thumbnails[viTriChonHinhKeTiep].classList.add('active'); // thay đường viền cho hình nhỏ kế tiếp
        hinhNhoHienTai.classList.remove('active'); // xóa đường viền của hình nhỏ hiện tại
        hinhNhoHienTai = thumbnails[viTriChonHinhKeTiep]; // chuyển hình nhỏ hiện tại sang hình nhỏ kế tiếp
        
        positionTimeout = setTimeout(changeTimeout, 2000);
    }

    let positionTimeout = setTimeout(changeTimeout, 2000);
} else {
    console.error('Element không tồn tại: .big-photo hoặc .thumbnail');
}
