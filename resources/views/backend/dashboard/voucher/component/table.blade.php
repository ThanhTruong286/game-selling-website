                        <table class="table">
                            <thead>
                            <tr>
                                <th>Check Box</th>
                                <th>Hình Ảnh</th>
                                <th>Nội Dung</th>
                                <th>Giá Trị</th>
                                <th>Loại Voucher</th>
                                <th>Thao Tác</th>
                            </tr>
                            </thead>
                            <tbody>

                            <!-- xuat du lieu thuc te cua bang users -->
                            @foreach($data as $value)
                            <tr>
                                <td><input type="checkbox" id="checkAll"></td>
                                <td><img width="150px" height="80px" src="{{ asset('storage/images/' . $value->image) }}" alt=""></td>
                                <!-- information -->
                                <td>
                                    {{ $value->content }}
                                </td>
                                <!-- address field -->
                                <td>
                                    {{ $value->value }}
                                </td>
                                <td>
                                    {{ $value->type }}
                                </td>
                                <!-- switch button -->
                                <!-- edit button -->
                                <td>
                                    <a href="{{route('voucher.edit.form',['voucher_id'=>$value->id])}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('voucher.delete',['voucher_id'=>$value->id,'file'=>$value->image])}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- tao phan trang bang ham links() su dung bootstrap-4 -->
                        {{ $data->links('pagination::bootstrap-4') }}