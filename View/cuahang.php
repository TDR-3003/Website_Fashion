
<div id="body_cuahang">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="cuahang__subnav">
                    <div class="subnav__header">
                        <h3 class="subnav__header__text">Lọc Sản Phẩm</h3>
                    </div>
                    <form action="" method="GET">
                        <input type="hidden" name="act" value="cuahang">
                        <ul class="subnav__list">
                            <li class="subnav__list-item">
                                <span class="sufmbnav__list-item__text">Giá</span>
                                <div class="subnav__filter-price">
                                    <ul class="subnav__filter-price__list">
                                        <li class="subnav__filter-price__list-item">
                                            <input type="radio" name="filter-price" id="filter-price1" value="0-100000">
                                            <label for="filter-price1">Dưới 100.000 VND</label>
                                        </li>
                                        <li class="subnav__filter-price__list-item">
                                            <input type="radio" name="filter-price" id="filter-price2" value="100000-200000">
                                            <label for="filter-price2">100.000 - 200.000 VND</label>
                                        </li>
                                        <li class="subnav__filter-price__list-item">
                                            <input type="radio" name="filter-price" id="filter-price3" value="200000-300000">
                                            <label for="filter-price3">200.000 - 300.000 VND</label>
                                        </li>
                                        <li class="subnav__filter-price__list-item">
                                            <input type="radio" name="filter-price" id="filter-price4" value="300000-500000">
                                            <label for="filter-price4">300.000 - 500.000 VND</label>
                                        </li>
                                        <li class="subnav__filter-price__list-item">
                                            <input type="radio" name="filter-price" id="filter-price5" value="500000-1000000000000000000000">
                                            <label for="filter-price5">500.000 VND trở lên</label>
                                        </li>
                                    </ul>
                                </div>                                    
                            </li>
                            <li class="subnav__list-item">
                                <div class="row">
                                    <div class="col-6">
                                        <span class="subnav__list-item__text">Màu</span>
                                        <div class="subnav__filter-price">
                                            <ul class="subnav__filter-price__list">
                                                <?php foreach($allColor as $key=>$value){ ?> 
                                                    <li class="subnav__filter-price__list-item">
                                                        <input type="radio" name="filter-color" id="<?=$value['color']?>" value="<?=$value['color']?>">
                                                        <label for="<?=$value['color']?>"><?=$value['color']?></label>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <span class="subnav__list-item__text">Size</span>
                                        <div class="subnav__filter-price">
                                            <select name="filter-size" class="">
                                                <option value="">--chose--</option>
                                                <?php foreach($allSize as $key=>$value){ ?> 
                                                    <option value="<?=$value['size']?>">
                                                        <?=$value['size']?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="subnav__list-item__btn">
                                    Lọc
                                </button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="cuahang__product">
                 <div class="cuahang__product__header">
                    <span class="cuahang__product__header__text">Sắp xếp theo: </span>
                    <a href="#" class="cuahang__product__header__btn">
                        Phổ biến
                    </a>
                    <a href="?act=cuahang&latest=1" class="cuahang__product__header__btn active">
                        Mới nhất
                    </a>
                    <a href="?act=cuahang&topSelling=1" class="cuahang__product__header__btn">
                        bán chạy
                    </a>
                    <div class="cuahang__product__header__btn cuahang__product__header__btn--wrap">
                        Loại Sản phẩm 
                        <i class="fas fa-chevron-down"></i>
                        <ul class="filter__sort">
                            <!-- <li class="filter__sort-item">
                                <a href="#">Giá: từ thấp đến cao</a>
                            </li>
                            <li class="filter__sort-item">
                                <a href="#">Giá: từ cao đến thấp</a>
                            </li> -->
                            <?php foreach($allCategory as $key=>$value){ ?>
                                <li class="filter__sort-item">
                                    <a href="?act=cuahang&category=<?=$value['idCategoryProduct'];?>">
                                        <?php echo $value['categoryName']; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    
                    <div class="devide__page">
                        <div class="devide__page__text">
                            <span class="devide__page__text--page">1</span>
                            <span class="devide__page__text--sumpage">/25</span>
                        </div>
                        <div class="devide__page__btn">
                            <div class="devide__page__btn__item devide__page__btn--left">
                                <i class="fas fa-chevron-left"></i>
                            </div>
                            <div class="devide__page__btn__item devide__page__btn--right active">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                    </div>   
                </div>
                <div class="cuahang_show-product">
                    <div class="grid_row">
                        <!-- item product -->
                        <?php foreach($allProduct as $key=>$value){ ?>
                            <div class="grid_column-2">
                                <div class="cuahang_show-product__item">
                                    <div class="image__wrap">
                                        <img class="cuahang_show-product__item__img" src="./assets/img/product/<?=$value['image']?>" alt="">
                                    </div>
                                    <p class="cuahang_show-product__item__name">
                                        <?=$value['productName']?>
                                    </p>
                                    <div class="cuahang_show-product__item__name__price">
                                        <!-- 
                                        <span class="cuahang_show-product__item__name--old">
                                            1,000.000đ 
                                        </span> 
                                        -->
                                    <span class="cuahang_show-product__item__name--curent">
                                       <?=$value['productUnitPrice']?>
                                    </span>
                                    <p class="size-color">
                                        size: <?=$value['size']?>
                                        -
                                        color: <?=$value['color']?>
                                    </p>
                            </div>
                            <div class="cuahang_show-product__item__name__btn">
                                <a href="?act=details&id=<?=$value['idProduct']?>">
                                    Xem chi tiết
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- phân trang -->
            <!-- <div class="grid_row cuahang_product__paging--wrap">
                <div class="cuahang_product__paging">
                    <a href="#" class="cuahang_product__paging__btn-left">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <ul class="cuahang_product__paging-list">
                        <li class="cuahang_product__paging-item active">
                            <a href="#">1</a>
                        </li>
                        <li class="cuahang_product__paging-item">
                            <a href="#">2</a>
                        </li>
                        <li class="cuahang_product__paging-item">
                            <a href="#">3</a>
                        </li>
                        <li class="cuahang_product__paging-item">
                            <a href="#">...</a>
                        </li>
                        <li class="cuahang_product__paging-item">
                            <a href="#">50</a>
                        </li>
                    </ul>
                    <a href="#" class="cuahang_product__paging__btn-right">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div> -->
        </div>
    </div>
</div>
</div>
</div>
</div>
