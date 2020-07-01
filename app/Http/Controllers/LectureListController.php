<?php

namespace App\Http\Controllers;

use App\LectureList;
use Illuminate\Http\Request;

class LectureListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LectureList::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $lecture = LectureList::create($request->all());

        // return response()->json($lecture, 201);
        // $this->validate($request, [
        //         'filenames' => 'required',
        //         'filenames.*' => 'mimes:doc,pdf,docx,zip'
        // ]);
        $data = [];
        if($request->hasfile('lecture_file'))
        {
            foreach($request->file('lecture_file') as $file)

            {
                $lecture= new LectureList();
                $lecture->course_id = $request->course_id;
                $lecture->lecture_title = $request->lecture_title;

                $name = time().'.'.$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  

                $data[] = $name;  
                $lecture->lecture_file=$name;

                $lecture->save();
               

            }

             return response()->json([
                    'code'   => 200,
                    'status' => true,
                    'message'=> "Lecture list Successfully Store",
                ], 200);


         }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LectureList  $lectureList
     * @return \Illuminate\Http\Response
     */
    public function show(LectureList $lectureList, $course_id)
    {
         return LectureList::with('course')
        ->where('course_id', $course_id)
        ->get();  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LectureList  $lectureList
     * @return \Illuminate\Http\Response
     */
    public function edit(LectureList $lectureList, $id)
    {
        return LectureList::findOrFail($id);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LectureList  $lectureList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LectureList $lectureList, $id)
    {
        
        // $lectureList->update($request->all());

        // return response()->json($lectureList, 200);
        $lecture = LectureList::findOrFail($id);
        $lecture->update($request->all());
        return $lecture;

        // return response()->json([
        //         'code'   => 200,
        //         'status' => true,
        //         'message'=> "Lecture List Successfully Updated",
        //     ], 200);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LectureList  $lectureList
     * @return \Illuminate\Http\Response
     */
    public function destroy(LectureList $lectureList, $id)
    {
        $res = LectureList::destroy($id);
        if ($res) {
            return response()->json([
                'status' => '1',
                'msg' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => '0',
                'msg' => 'fail'
            ]);
        }    
    }
}
