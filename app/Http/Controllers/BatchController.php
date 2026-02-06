<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{

    public function batch()
    {
        return view('admin.add-batch');
    }

    public function addBatch(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
        ]);

        $batches = Batch::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'created_by' => auth()->id(),
        ]);

        if ($batches) {
            return back()->with('success', 'Batch Add Successful!');
        }
    }


    public function batchList()
    {
        $data = Batch::all();

        return view('admin.batch-list', compact('data'));
    }

    public function editBatch($id)
    {
        $data = Batch::findOrFail($id);
        return view('admin.edit-batch', compact('data'));
    }

    public function updateBatch(Request $request, $id)
    {
        $data = Batch::findOrFail($id);

        $data->name = $request->name;
        $data->start_date = $request->start_date;
        $data->updated_by = auth()->id();

        $data->save();

        return redirect()->route('batch-list')
            ->with('success', 'Batch updated successfully!');
    }

    public function deleteBatch($id)
    {
        $batch = Batch::findOrFail($id);
        $batch->deleted_by = auth()->id();
        $batch->save();

        $batch->delete();

        return redirect()->route('batch-list')
            ->with('success', 'Batch deleted successfully!');
    }
}
