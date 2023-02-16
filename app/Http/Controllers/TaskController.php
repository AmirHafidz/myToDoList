<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use App\Models\TodoListDetail;
use Illuminate\Http\Request;
use Throwable;

class TaskController extends Controller
{

    public function store(Request $request)
    {

        $this->validate($request,[
            'task_user_id' => 'required',
            'task_category' => 'required',
            'task_level' => 'required',
            'task_main_title' => 'required',
            'task_sub_title' => 'required',
            'task_date_start' => 'required',
            'task_date_end' => 'required',
            'task_time_start' => 'required',
            'task_time_end' => 'required',
            'task_description_one' => 'required',
            'task_description_two' => 'required',
        ]);

        $todo_data = [
            'category_id' => $request->task_category,
            'level_id' => $request->task_level,
            'user_id' => $request->task_user_id,
            'name' => $request->task_main_title,
        ];

        $new_todo_list = TodoList::create($todo_data);

        $todo_details_data = [
            'todo_id' => $new_todo_list->id,
            'name' => $request->task_sub_title,
            'description_one' =>  $request->task_description_one,
            'description_two' =>  $request->task_description_two,
            'date_started' =>  $request->task_date_start,
            'date_end' =>  $request->task_date_end,
            'time_start' =>  $request->task_time_start,
            'time_end' =>  $request->task_time_end,
        ];

        TodoListDetail::create($todo_details_data);

        return response()->json([
            'message' => 'Task Created Successfully !'
        ],200);

        

    }

    public function show_all(Request $request,$user_id){
        
        $tasks = TodoList::where('user_id',$user_id)->with('todo_list_detail','todo_category','todo_level','todo_status','user')->orderByDesc('id')->get();
        return response()->json([
            'tasks' => $tasks,
        ],200);

    }

    public function edit_task(Request $request){
        $task = TodoList::where('id',$request->task_id)->with('todo_list_detail','todo_category','todo_level','user','todo_status')->first();
        return response()->json([
            'task' => $task
        ],200);
    }

    public function show_by_category(Request $request){
        if($request->category_id == 0){
            $tasks = TodoList::where('user_id',$request->user_id)->with('todo_list_detail','todo_category','todo_level','todo_status','user')->get();
            return response()->json([
                'tasks' => $tasks,
            ],200);
        }
        else{
            $tasks = TodoList::where('user_id',$request->user_id)->where('category_id',$request->category_id)->with('todo_list_detail','todo_category','todo_level','todo_status','user')->get();
            return response()->json([
                'tasks' => $tasks
            ],200);
        }
    }

    public function update_task(Request $request){
        $this->validate($request,[
            'edit_task_category' => 'required',
            'edit_task_main_title' => 'required',
            'edit_task_sub_title' => 'required',
            'edit_task_level' => 'required',
            'edit_task_date_start' => 'required',
            'edit_task_date_end' => 'required',
            'edit_task_time_start' => 'required',
            'edit_task_time_end' => 'required',
            'edit_task_description_one' => 'required',
            'edit_task_description_two' => 'required',
        ]);

        
        $todo_update = TodoList::where('id',$request->edit_task_id)->first();
        
        $todo_data = [
            'category_id' => $request->edit_task_category,
            'level_id' => $request->edit_task_level,
            'user_id' => $request->edit_task_user_id,
            'name' => $request->edit_task_main_title,
        ];

        $todo_update->update($todo_data);

        $todo_detail_data = [
            'todo_id' => $todo_update->id,
            'name' => $request->edit_task_sub_title,
            'description_one' =>  $request->edit_task_description_one,
            'description_two' =>  $request->edit_task_description_two,
            'date_started' =>  $request->edit_task_date_start,
            'date_end' =>  $request->edit_task_date_end,
            'time_start' =>  $request->edit_task_time_start,
            'time_end' =>  $request->edit_task_time_end,
        ];

        $todo_detail_update = TodoListDetail::where('todo_id',$todo_update->id)->first();
        $todo_detail_update->update($todo_detail_data);

        return response()->json([
            'message' => 'The task have been updated !'
        ],200);
        
    }

    public function delete_task(Request $request){
        $task = TodoList::where('id',$request->task_id)->with('todo_category','todo_level','todo_status','user','todo_list_detail')->first();
        $task->delete();
        return response()->json([
            'message' => 'Task Deleted Successfully'
        ],200);
    }

    public function show_by_status(Request $request){

        if($request->status_id == 0){
            $tasks = TodoList::where('user_id',$request->user_id)->with('todo_list_detail','todo_category','todo_level','todo_status','user')->get();
            return response()->json([
                'tasks' => $tasks,
            ],200);
        }
        else{
            $tasks = TodoList::where('user_id',$request->user_id)->where('status_id',$request->status_id)->with('todo_list_detail','todo_category','todo_level','todo_status','user')->get();
            return response()->json([
                'tasks' => $tasks
            ],200);
        }
    }

    public function done_status(Request $request){
        $task_done = TodoList::where('user_id',$request->user_id)->where('id',$request->task_id)->with('todo_list_detail','todo_category','todo_level','todo_status','user')->first();

        if($request->done_status > 6){
            return response()->json([
                'message' => 'Unknown status for the task'
            ],422);
        }
        else{
            $task_done->update(['status_id' => (int)$request->done_status]);

            if($task_done->status_id == 3){
                return response()->json([
                    'message'=> 'The task status have been updated !',
                ],200);

            }else if($task_done->status_id){
                return response()->json([
                    'message'=> 'The task status have been canceled !',
                ],200);
            }
        }


    }

    public function fetch_datetime(Request $request){
        $task = TodoListDetail::where('todo_id',$request->task_id)->get(['date_started','date_end','time_start','time_end']);
        if(count($task) != 0){
            return response()->json([
                'task' => $task,
            ],200);
        }else{
            return response()->json([
                'message' => 'Id task not found !'
            ],404);
        }
    }

    public function delay_datetime(Request $request){
        $delay_data = $_POST;
        // dd($delay_data['task_id']);
        $task = TodoListDetail::where('todo_id',$delay_data['task_id'])->first();
        $task_datetime = [
            'date_started' => $task->date_started,
            'date_end' => $task->date_end,
            'time_start' => $task->time_start,
            'time_end' => $task->time_end,
        ];
        if(array_diff($delay_data['delay_data'],$task_datetime)){
            $new_delay_datetime = array_diff($delay_data['delay_data'],$task_datetime);
            $task->update($new_delay_datetime);
            return response()->json([
                'isChange' => true,
                'message' => 'Change have been made',
            ],200);
        }else{
            return response()->json([
                'isChange' => false,
                'message' => 'No Changed have been made.'
            ],200);
        }
        // if($delay_data['delay_data']['date_started'] == $task->date_started){
        // }
    }

    public function show_by_level(Request $request){
        
        try {
            $tasks = TodoList::where('user_id',$request->user_id)->where('level_id',$request->level_id)->with('user','todo_list_detail','todo_status','todo_level','todo_category')->get();
            return response()->json([
                'tasks' => $tasks,
            ],200);
        } catch (Throwable $e) {
            report($e);
            return response()->json([
                'message' => $e
            ],422);
        }
    }

    public function sort_task(Request $request){

        switch ($request->sort_id) {
            case 1:
                $tasks = TodoList::where('user_id',$request->user_id)->with('todo_list_detail','todo_category','todo_level','todo_status','user')->orderBy('name','asc')->get();
                return response()->json([
                    'tasks' => $tasks,
                ],200);
                break;
            case 2:
                // $tasks = TodoList::where('user_id',$request->user_id)->leftjoin('todo_list_details', 'todo_list_details.todo_id', '=', 'todo_lists.id')->orderBy('todo_list_details.date_end','asc')->with('todo_category','todo_level','todo_status','user','todo_list_detail')->get();
                // return response()->json([
                //     'tasks' => $tasks,
                // ],200);
                $tasks = TodoList::where('user_id',$request->user_id)->with('todo_category','todo_level','todo_status','user','todo_list_detail')->leftJoin('todo_list_details', 'todo_lists.id', '=', 'todo_list_details.id')->orderBy('todo_list_details.date_end','asc')
                ->select('todo_lists.*','todo_list_details.name as m_name')
                ->get();
                return response()->json([
                    'tasks' => $tasks,
                ],200);
                break;
            case 3:
                $tasks = TodoList::where('user_id',$request->user_id)->with('todo_list_detail','todo_category','todo_level','todo_status','user')->orderBy('id','desc')->get();
                return response()->json([
                    'tasks' => $tasks,
                ],200);
                break;
            case 4:
                $tasks = TodoList::where('user_id',$request->user_id)->with('todo_list_detail','todo_category','todo_level','todo_status','user')->orderBy('level_id','desc')->get();
                return response()->json([
                    'tasks' => $tasks,
                ],200);
              break;
            default:
                return response()->json([
                    'message' => 'What sort id is this?'
                ],422);
          }

    }
}
