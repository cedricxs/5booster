[33mcommit 28c986dac481e46e5bb627ddd1caf8276afecc23[m[33m ([m[1;36mHEAD -> [m[1;32mdev[m[33m, [m[1;31morigin/dev[m[33m)[m
Author: 979581491@qq.com <979581491@qq.com>
Date:   Thu Oct 8 03:14:02 2020 +0800

    add csrf_verification login

[1mdiff --git a/.idea/workspace.xml b/.idea/workspace.xml[m
[1mindex 7b16c3d..ed16f28 100644[m
[1m--- a/.idea/workspace.xml[m
[1m+++ b/.idea/workspace.xml[m
[36m@@ -2,41 +2,10 @@[m
 <project version="4">[m
   <component name="ChangeListManager">[m
     <list default="true" id="fba3cf10-2f1b-4db9-aa24-9a5dbf3e8067" name="Default Changelist" comment="">[m
[31m-      <change afterPath="$PROJECT_DIR$/resources/views/admin/categories/create.blade.php" afterDir="false" />[m
[31m-      <change afterPath="$PROJECT_DIR$/resources/views/admin/categories/edit.blade.php" afterDir="false" />[m
[31m-      <change afterPath="$PROJECT_DIR$/resources/views/admin/categories/index.blade.php" afterDir="false" />[m
[31m-      <change afterPath="$PROJECT_DIR$/resources/views/client/repondre_questionnaire_svp.blade.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/.idea/5booster.iml" beforeDir="false" afterPath="$PROJECT_DIR$/.idea/5booster.iml" afterDir="false" />[m
       <change beforePath="$PROJECT_DIR$/.idea/workspace.xml" beforeDir="false" afterPath="$PROJECT_DIR$/.idea/workspace.xml" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/app/Http/Controllers/Admin/WorkoutController.php" beforeDir="false" afterPath="$PROJECT_DIR$/app/Http/Controllers/Admin/ProgramController.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/app/Http/Controllers/ApiController.php" beforeDir="false" afterPath="$PROJECT_DIR$/app/Http/Controllers/ApiController.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/app/Http/Controllers/Client/IndexController.php" beforeDir="false" afterPath="$PROJECT_DIR$/app/Http/Controllers/Client/IndexController.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/app/Http/Model/ClientHasCategory.php" beforeDir="false" afterPath="$PROJECT_DIR$/app/Http/Model/ClientHasCategory.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/app/Http/Model/Exercise.php" beforeDir="false" afterPath="$PROJECT_DIR$/app/Http/Model/Exercise.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/app/Http/Model/ProgramHasCategory.php" beforeDir="false" afterPath="$PROJECT_DIR$/app/Http/Model/ProgramHasCategory.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/app/Http/Model/ProgramHasExercise.php" beforeDir="false" afterPath="$PROJECT_DIR$/app/Http/Model/ProgramHasExercise.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/app/Http/Model/User.php" beforeDir="false" afterPath="$PROJECT_DIR$/app/Http/Model/User.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/app/Http/Model/WeekProgram.php" beforeDir="false" afterPath="$PROJECT_DIR$/app/Http/Model/WeekProgram.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/database/migrations/2020_03_03_001925_create_users_table.php" beforeDir="false" afterPath="$PROJECT_DIR$/database/migrations/2020_03_03_001925_create_users_table.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/database/migrations/2020_08_27_154036_create_week_program_table.php" beforeDir="false" afterPath="$PROJECT_DIR$/database/migrations/2020_08_27_154036_create_week_program_table.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/public/css/ch-ui.admin.css" beforeDir="false" afterPath="$PROJECT_DIR$/public/css/ch-ui.admin.css" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/public/css/style.css" beforeDir="false" afterPath="$PROJECT_DIR$/public/css/style.css" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/public/css/style_workout.css" beforeDir="false" afterPath="$PROJECT_DIR$/public/css/style_workout.css" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/public/js/app-recette.js" beforeDir="false" afterPath="$PROJECT_DIR$/public/js/app-recette.js" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/public/js/app-workout.js" beforeDir="false" afterPath="$PROJECT_DIR$/public/js/app-workout.js" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/public/mix-manifest.json" beforeDir="false" afterPath="$PROJECT_DIR$/public/mix-manifest.json" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/resources/assets/js/components/workout/WorkoutPreview.vue" beforeDir="false" afterPath="$PROJECT_DIR$/resources/assets/js/components/workout/WorkoutPreview.vue" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/resources/assets/js/components/workout/Workouts.vue" beforeDir="false" afterPath="$PROJECT_DIR$/resources/assets/js/components/workout/Workouts.vue" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/resources/views/admin/index.blade.php" beforeDir="false" afterPath="$PROJECT_DIR$/resources/views/admin/index.blade.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/resources/views/admin/programs/create.blade.php" beforeDir="false" afterPath="$PROJECT_DIR$/resources/views/admin/programs/create.blade.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/resources/views/admin/programs/edit.blade.php" beforeDir="false" afterPath="$PROJECT_DIR$/resources/views/admin/programs/edit.blade.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/resources/views/admin/programs/index.blade.php" beforeDir="false" afterPath="$PROJECT_DIR$/resources/views/admin/programs/index.blade.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/resources/views/admin/recettes/create.blade.php" beforeDir="false" afterPath="$PROJECT_DIR$/resources/views/admin/recettes/create.blade.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/resources/views/admin/recettes/edit.blade.php" beforeDir="false" afterPath="$PROJECT_DIR$/resources/views/admin/recettes/edit.blade.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/resources/views/layout/admin.blade.php" beforeDir="false" afterPath="$PROJECT_DIR$/resources/views/layout/admin.blade.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/resources/views/workout/view.blade.php" beforeDir="false" afterPath="$PROJECT_DIR$/resources/views/program/view.blade.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/routes/api.php" beforeDir="false" afterPath="$PROJECT_DIR$/routes/api.php" afterDir="false" />[m
[31m-      <change beforePath="$PROJECT_DIR$/routes/web.php" beforeDir="false" afterPath="$PROJECT_DIR$/routes/web.php" afterDir="false" />[m
[32m+[m[32m      <change beforePath="$PROJECT_DIR$/app/Http/Kernel.php" beforeDir="false" afterPath="$PROJECT_DIR$/app/Http/Kernel.php" afterDir="false" />[m
[32m+[m[32m      <change beforePath="$PROJECT_DIR$/app/Http/Middleware/VerifyCsrfToken.php" beforeDir="false" afterPath="$PROJECT_DIR$/app/Http/Middleware/VerifyCsrfToken.php" afterDir="false" />[m
[32m+[m[32m      <change beforePath="$PROJECT_DIR$/resources/views/auth/login.blade.php" beforeDir="false" afterPath="$PROJECT_DIR$/resources/views/auth/login.blade.php" afterDir="false" />[m
     </list>[m
     <option name="EXCLUDED_CONVERTED_TO_IGNORED" value="true" />[m
     <option name="SHOW_DIALOG" value="false" />[m
[36m@@ -303,6 +272,9 @@[m
       <workItem from="1598626792025" duration="5289000" />[m
       <workItem from="1598715623742" duration="33927000" />[m
       <workItem from="1598978581806" duration="3690000" />[m
[32m+[m[32m      <workItem from="1602020428791" duration="3263000" />[m
[32m+[m[32m      <workItem from="1602023836101" duration="33000" />[m
[32m+[m[32m      <workItem from="1602084024019" duration="9984000" />[m
     </task>[m
     <servers />[m
   </component>[m
[1mdiff --git a/app/Http/Kernel.php b/app/Http/Kernel.php[m
[1mindex 5f283f0..9af70c3 100644[m
[1m--- a/app/Http/Kernel.php[m
[1m+++ b/app/Http/Kernel.php[m
[36m@@ -33,7 +33,7 @@[m [mclass Kernel extends HttpKernel[m
             \Illuminate\Session\Middleware\StartSession::class,[m
             // \Illuminate\Session\Middleware\AuthenticateSession::class,[m
             \Illuminate\View\Middleware\ShareErrorsFromSession::class,[m
[31m-            \App\Http\Middleware\VerifyCsrfToken::class,[m
[32m+[m[32m            //\App\Http\Middleware\VerifyCsrfToken::class,放在$routeMiddleware内[m
             \Illuminate\Routing\Middleware\SubstituteBindings::class,[m
             \App\Http\Middleware\SetLocale::class,[m
         ],[m
[36m@@ -66,6 +66,7 @@[m [mclass Kernel extends HttpKernel[m
         'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,[m
         'admin' => \App\Http\Middleware\AdminAuthenticate::class,[m
         'verify_email'=> \App\Http\Middleware\MustVerifyEmail::class,[m
[32m+[m[32m        'verify_csrf'=> \App\Http\Middleware\VerifyCsrfToken::class,[m
     ];[m
 [m
     /**[m
[1mdiff --git a/app/Http/Middleware/VerifyCsrfToken.php b/app/Http/Middleware/VerifyCsrfToken.php[m
[1mindex c8abe2a..4d51cb6 100644[m
[1m--- a/app/Http/Middleware/VerifyCsrfToken.php[m
[1m+++ b/app/Http/Middleware/VerifyCsrfToken.php[m
[36m@@ -3,6 +3,7 @@[m
 namespace App\Http\Middleware;[m
 [m
 use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;[m
[32m+[m[32muse Illuminate\Support\Facades\App;[m
 [m
 class VerifyCsrfToken extends Middleware[m
 {[m
[36m@@ -21,9 +22,16 @@[m [mclass VerifyCsrfToken extends Middleware[m
     protected $except = [[m
         //[m
     ];[m
[31m-    [m
[32m+[m
     public function handle($request, \Closure $next)[m
     {[m
[32m+[m[32m        $request_token = $request->_token;[m
[32m+[m[32m        $session_token = csrf_token();[m
[32m+[m[32m        if($request_token!=$session_token){[m
[32m+[m[32m            return redirect('login')->with('msg','your operation is too frequent, please try again later');[m
[32m+[m[32m        }[m
[32m+[m[32m        $request->getSession()->regenerateToken();[m
[32m+[m
         return $next($request);[m
     }[m
 }[m
[1mdiff --git a/resources/views/auth/login.blade.php b/resources/views/auth/login.blade.php[m
[1mindex 584b95b..8cdd5b7 100644[m
[1m--- a/resources/views/auth/login.blade.php[m
[1m+++ b/resources/views/auth/login.blade.php[m
[36m@@ -13,7 +13,7 @@[m
             </div>[m
             <div class="col-sm">[m
                 <form class="right" method="post" action="{{url('/login')}}">[m
[31m-                    <input type="hidden" name="_token" value="LAd6l5BdPY3aWyCrWYTBeMvCc04OQdFx8a3hIbiP">[m
[32m+[m[32m                    {{csrf_field()}}[m
                     <div class="form-group" id="username">[m
                         <input name="email" class="form-control" aria-describedby="emailHelp" placeholder="@lang('message.email')">[m
                     </div>[m
