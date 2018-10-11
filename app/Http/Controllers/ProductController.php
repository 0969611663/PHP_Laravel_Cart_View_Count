<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index ()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function show ($id)
    {
        $productKey = 'product_' . $id;

        // Kiểm tra Session của sản phẩm có tồn tại hay không.
        // Nếu không tồn tại, sẽ tự động tăng trường view_count lên 1 đồng thời tạo session lưu trữ key sản phẩm.
        if (!Session::has($productKey)) {
            Product::where('id', $id)->increment('view_count');
            Session::put($productKey, 1);
        }

        // Sử dụng Eloquent để lấy ra sản phẩm theo id
        $product = Product::find($id);

        // Trả về view
        return view('product.show', compact(['product']));
    }

    public function create ()
    {
        return view('product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        //Khởi tạo mới đối tượng task, gán các trường tương ứng với request gửi lên từ trình duyệt
        $product = new Product();
        $product->name = $request->input('inputProduct');
        $product->description = $request->input('inputDescription');
        $product->price = $request->input('inputPrice');
        $product->view_count = $request->input('inputViewCount');
        // Nếu file không tồn tại thì trường image gán bằng NULL
        if (!$request->hasFile('inputFile')) {
            $product->image = $request->input('inputFile');
        } else {
            $file = $request->file('inputFile');
            //Lấy ra định dạng và tên mới của file từ request
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $request->input('inputFileName');
            // Gán tên mới cho file trước khi lưu lên server
            $newFileName = "$fileName.$fileExtension";
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('inputFile')->storeAs('public/images', $newFileName);
            // Gán trường image của đối tượng task với tên mới
            $product->image = $newFileName;
        }
        $product->save();
        $message = "Tạo Task $request->inputTitle thành công!";
        Session::flash('create-success', $message);
        return redirect()->route('product_index');
    }

    public function delete ($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product_index');
    }
}
