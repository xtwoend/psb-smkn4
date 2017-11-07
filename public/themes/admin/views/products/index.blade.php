					<div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>#ID</th>
                                            <th>NAME</th>
                                            <th>CURRENT STOCK</th>
                                            <th>RETAIL PRICE</th>
                                            <th>UPDATED AT</th>
                                            <th></th>
                                        </tr>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $product->updated_at }}</td>
                                            <td></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            {{ $products->links() }}
                        </div>
                    </div>