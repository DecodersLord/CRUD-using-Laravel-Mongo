<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resume;
use App\Student;
use App\Project;
use App\Degree;
use App\Position;
use App\Internship;
use App\Award;
use App\Hobby;


use Illuminate\Support\Facades\DB;


class ResumeController extends Controller
{


    // protected $guarded = ['_id'];
    protected $fillable = ['name','email','address','dob'];


    public function store(Request $request){
        $data = $request->only('_id','data');
        $resume = $data['data']['resume'];
         $user_id = $data['_id'];



         $name = $resume['info']['name'];
         $email = $resume['info']['email'];
         $address = $resume['info']['address'];
         $dob = $resume['info']['dob'];



         $user = new Resume;
         $user->{'data.resume.info.name'} = $name;
         $user->{'data.resume.info.email'} = $email;
         $user->{'data.resume.info.address'} = $address;
         $user->{'data.resume.info.dob'} = $dob;


        $degrees = $resume['degree'];
        $user->{'data.resume.degree'} = $this->getDegrees($degrees);

        $internships = $resume['Internship'];
        $user->{'data.resume.internship'} = $this->getInternship($internships);

        $projects = $resume['project'];
        $user->{'data.resume.projects'} = $this->getProjects($projects);

        $positions = $resume['position'];
        $user->{'data.resume.position'} = $this->getPositions($positions);


        $awards = $resume['award'];
        $user->{'data.resume.award'} = $this->getAwards($awards);

        $hobbies = $resume['hobby'];
        $user->{'data.resume.hobby'} = $this->getHobby($hobbies);

        $user->save();
        return view('welcome');
    }


    public function Display(){
      $resume =  Resume::all();

    }

    public function Update(Request $request){
        // $user = Resume::where('data.resume.info.email', '='  , $request->email)->get();
        //
        // $data = $request->only('_id','data');
        // $resume = $data['data']['resume'];
        //  $user_id = $data['_id'];
        //
        //
        //
        //  $name = $resume['info']['name'];
        //  $email = $resume['info']['email'];
        //  $address = $resume['info']['address'];
        //  $dob = $resume['info']['dob'];
        //
        //  $user->{'data.resume.info.name'} = $name;
        //  $user->{'data.resume.info.email'} = $email;
        //  $user->{'data.resume.info.address'} = $address;
        //  $user->{'data.resume.info.dob'} = $dob;
        //
        //
        //  $degrees = $resume['degree'];
        //  $user->{'data.resume.degree'} = $this->getDegrees($degrees);
        //
        //  $internships = $resume['Internship'];
        //  $user->{'data.resume.internship'} = $this->getInternship($internships);
        //
        //  $projects = $resume['project'];
        //  $user->{'data.resume.projects'} = $this->getProjects($projects);
        //
        //  $positions = $resume['position'];
        //  $user->{'data.resume.position'} = $this->getPositions($positions);
        //
        //
        //  $awards = $resume['award'];
        //  $user->{'data.resume.award'} = $this->getAwards($awards);
        //
        //  $hobbies = $resume['hobby'];
        //  $user->{'data.resume.hobby'} = $this->getHobby($hobbies);

         // Resume::update($user);
         Resume::where('data.resume.info.email', '='  , $request->email)->update($request->all());
         return view('welcome');


    }

    protected function getProjects($projects)
    {
          $userProjects = [];
          if (count($projects) > 0) {
              foreach ($projects as $project) {
                  $userProjects[] = new Project(
                      $project['name'],
                      $project['description'],
                      $project['start'],
                      $project['end'],
                      $project['team_size'],
                      $project['guide']
                  );
              }
        }
        return $userProjects;
    }

    protected function getInternship($internships)
    {
          $userInternship = [];
          if (count($internships) > 0) {
              foreach ($internships as $internship) {
                  $userInternship[] = new Internship(
                      $internship['name'],
                      $internship['description'],
                      $internship['start'],
                      $internship['end'],
                      $internship['team_size'],
                      $internship['guide']
                  );
              }
        }
        return $userInternship;
    }

    protected function getDegrees($degrees)
    {
        $userDegrees = [];

        if(count($degrees) > 0){
          foreach($degrees as $degree){
              $userDegrees[] = new Degree(
                  $degree['name'],
                  $degree['institute'],
                  $degree['start_year'],
                  $degree['end_year'],
                  $degree['score']
              );
          }
        }
        return $userDegrees;
    }

    protected function getPositions($positions)
    {
          $userPositions = [];

          if(count($positions) > 0){
            foreach($positions as $position){
              $userPositions[] = new Position(
                $position['name']
              );
            }
          }
          return $userPositions;
    }

    protected function getAwards($awards)
    {
          $userAwards = [];

          if(count($awards) > 0){
            foreach($awards as $award){
              $userAwards[] = new Award(
                $award['name']
              );
            }
          }
          return $userAwards;
    }

    protected function getHobby($hobbies)
    {
          $userhobbies = [];

          if(count($hobbies) > 0){
            foreach($hobbies as $hobby){
              $userhobbies[] = new Hobby(
                $hobby['name']
              );
            }
          }
          return $userhobbies;
    }
}
