                        <table class="table">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="checkAll"></th><strong>Check All</strong>
                                <th>Hình Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá Sản Phẩm</th>
                                <th>Danh Mục</th>
                                <th>Còn Hàng</th>
                                <th>Thao Tác</th>
                            </tr>
                            </thead>
                            <tbody>

                            <!-- xuat du lieu thuc te cua bang users -->
                            @foreach($products as $value)
                            <tr>
                                <td><input type="checkbox" id="checkAll"></td>
                                <td><img width="150px" height="80px" src="{{ asset('assets/images/' . $value->image) }}" alt=""></td>
                                <!-- information -->
                                <td>
                                    {{ $value->name }}
                                </td>
                                <!-- address field -->
                                <td>
                                    {{ $value->price }}
                                </td>
                                <td>{{ $product_category }}</td>
                                <!-- switch button -->
                                <td>
                                    <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                    </label>
                                </td>
                                <!-- edit button -->
                                <td>
                                    <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- tao phan trang bang ham links() su dung bootstrap-4 -->
                        {{ $products->links('pagination::bootstrap-4') }}