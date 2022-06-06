<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{

    public function index()
    {
        $datas = Customer::all();
        return response()->json([
            'pesan' => 'Data Berhasil Ditemukan',
            'data' => $datas
        ], 200);
    }

    public function show($id)
    {
        $data = Customer::find($id);
        if (empty($data)) {
            return response()->json(['pesan' => 'Data Tidak ditemukan', 'data' => ''], 404);
        }
        return response()->json(['pesan' => 'Data Berhasil Ditemukan', 'data' => $data], 200);
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'id' => 'required|unique:customer',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        if ($validasi->fails()) {
            return response()->json(['pesan' => 'data gagal ditambahkan', 'data' => $validasi->errors()->all()], 404);
        }
        $data = Customer::create($request->all());
        return response()->json(['pesan' => 'data berhasil ditambahkan', 'data' => $data], 200);
    }

    public function update(Request $request, $id)
    {
        $customers = Customer::find($id);
        if (empty($customers)) {
            return response()->json(['pesan' => 'data tidak ditemukan', 'data' => ''], 404);
        } else {
            $validasi = Validator::make($request->all(), [
                'id' => 'required|unique:customer',
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'address' => 'required'
            ]);
            if ($validasi->fails()) {
                return response()->json(['pesan' => 'Data Gagal diUpdate', 'data' => $validasi->errors()->all()], 404);
            }
            $customers->update($request->all());
            return response()->json(['pesan' => 'Data Berhasil disimpan', 'data' => $customers], 200);
        }
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        if (empty($customer)) {
            return response()->json(['pesan' => 'Data Tidak ditemukan', 'data' => ''], 404);
        }
        $customer->delete();
        return response()->json(['pesan' => 'Data Berhasil dihapus', 'data' => $customer]);
    }

}
