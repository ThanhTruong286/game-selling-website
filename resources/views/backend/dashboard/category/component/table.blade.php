                        <table class="table">
                            <thead>
                            <tr>
                                <th>Check Box</th>
                                <th>Hình Ảnh</th>
                                <th>Tên Danh Mục</th>
                                <th>Slug</th>
                                <th>Còn Hàng</th>
                                <th>Thao Tác</th>
                            </tr>
                            </thead>
                            <tbody>

                            <!-- xuat du lieu thuc te cua bang users -->
                            @foreach($categories as $value)
                            <tr>
                                <td><input type="checkbox" id="checkAll"></td>
                                <td><img width="150px" height="80px" src="{{ asset('storage/images/' . $value->image) }}" alt=""></td>
                                <!-- information -->
                                <td>
                                    {{ $value->name }}
                                </td>
                                <!-- address field -->
                                <td>
                                    {{ $value->slug }}
                                </td>
                                <!-- switch button -->
                                <td>
                                    <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                    </label>
                                </td>
                                <!-- edit button -->
                                <td>
                                    <a href="{{route('category.edit.form',['categories_id'=>$value->id])}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('category.delete',['categories_id'=>$value->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- tao phan trang bang ham links() su dung bootstrap-4 -->
                        {{ $categories->links('pagination::bootstrap-4') }}