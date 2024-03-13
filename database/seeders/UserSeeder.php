<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Employer;
use App\Models\PostedJob;
use App\Models\Seeker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $adminUser = User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@itsjiff.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password@123'),
        ]);

        $adminUser->syncRoles('admin');

        $employerUser = User::create([
            'first_name' => 'NeoSOFT',
            'last_name' => 'Tech',
            'username' => 'employer',
            'email_verified_at' => now(),
            'email' => 'employer@itsjiff.com',
            'password' => Hash::make('password@123'),
        ]);

        $employerUser->syncRoles('employer');

        $employer = Employer::create([
            'company' => 'Artisans Intelligence',
            'user_id' => $employerUser->id,
        ]);

        $firstPostedJob = PostedJob::create([
            'employer_id' => $employer->id,
            'title' => 'PHP Developer',
            'description' => '<p style="font-family: Satoshi, &quot;Satoshi Fallback&quot;; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; overflow-wrap: break-word; color: rgb(71, 77, 106);"><strong style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; color: var(--N800); font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Role &amp; responsibilities</strong></p><ul style="font-family: Satoshi, &quot;Satoshi Fallback&quot;; margin: 1em 0px 1em 1em; padding: 0px 0px 0px 1em; border: 0px; font-size: 14px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; color: rgb(71, 77, 106);"><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Strong hands-on knowledge of setting up production, staging and dev environments on AWS/GCP/Azure/OpenStack.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Deep experience in root cause analysis and fixing issues with production systems.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Strong hands-on knowledge of technologies like Terraform, Docker.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Strong understanding of continuous testing environments such as Jenkins.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Strong skills in configuration management tools such as github.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Linux / Windows administration and shell scripting are strongly desired.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Database setup knowledge is strongly desired.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Experience in infrastructure management and monitoring.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Strong understanding of IT Security and related audits.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Strong understanding of high-performance computing.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Strong understanding of Big Data technologies and high availability.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Strong understanding of desktop virtualization, AMI, AppEngine etc.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Good understanding of LAMP and MEAN stack frameworks.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Good understanding of coding standards and quality measures.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Excellent communication skills.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Can join ASAP.</li></ul>',
            'years' => 2,
            'months' => 0,
            'job_type_id' => 6,
            'location_id' => 1481,
        ]);

        $firstPostedJob->skills()->sync([23]);

        $secondPostedJob = PostedJob::create([
            'employer_id' => $employer->id,
            'title' => 'DevOps Engineer',
            'description' => '<h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; overflow-wrap: break-word; font-weight: 700; line-height: 20px; color: var(--N800); font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Job description</h2><div class="" style="margin: 0px; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; overflow-wrap: break-word; font-family: var(--font-family,&quot;sans-serif&quot;) !important;"><div class="styles_JDC__dang-inner-html__h0K4t" style="margin: 10px 0px 0px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; overflow-wrap: break-word; line-height: 20px; color: var(--N700); font-family: var(--font-family,&quot;sans-serif&quot;) !important;"><ul style="font-family: Satoshi, &quot;Satoshi Fallback&quot;; margin: 1em 0px 1em 1em; padding: 0px 0px 0px 1em; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; color: rgb(71, 77, 106);"><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Professional experience using PHP/MY SQL</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Expert knowledge of PHP scripting</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Proficiency in HTML, CSS, JavaScript, Jquery, Responsive, AJAX</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">To develop high-end web applications in PHP, MySQL and AJAX</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">To research and implement new technologies.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Should possess PHP, MySQL, Jquery, Responsive, and JavaScript skills.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Strong self-motivation with an ability to work on multiple con-current.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Candidate should have strong MySQL and PHP coding skills.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Sound knowledge in the HTML and CSS (Div tag based)</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Ability to listen to personnel, understands their needs, propose alternatives, and specify the best solution.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">You should be able to work independently on your own to carry out the project task.</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Good Communication Skills.</li></ul></div></div>',
            'years' => 5,
            'months' => 0,
            'job_type_id' => 1,
            'location_id' => 322,
        ]);

        $secondPostedJob->skills()->sync([38,27]);

        $seekerUser = User::create([
            'first_name' => 'Steve',
            'last_name' => 'Spencer',
            'username' => 'seeker',
            'email_verified_at' => now(),
            'email' => 'seeker@itsjiff.com',
            'password' => Hash::make('password@123'),
        ]);
        $seekerUser->syncRoles('seeker');

        $seeker = Seeker::create([
            'user_id' => $seekerUser->id,
            'experience' => 2.0,
            'title' => "PHP Developer",
            'resume' => null,
            'job_type_id' => 1,
            'location_id' => 814,
        ]);

        $seeker->skills()->sync([36,20,7]);

        $application = Application::create([
            'job_id' => $firstPostedJob->id,
            'employer_id' => $employer->id,
            'seeker_id' => $seeker->id,
            'headline' => 'Testing Laravel Developer',
            'cover_letter' => '<ul style="font-family: Satoshi, &quot;Satoshi Fallback&quot;; margin: 1em 0px 1em 1em; padding: 0px 0px 0px 1em; border: 0px; font-size: 14px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; color: rgb(71, 77, 106);"><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Professional experience using PHP/MY SQL</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Expert knowledge of PHP scripting</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">Proficiency in HTML, CSS, JavaScript, Jquery, Responsive, AJAX</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">To develop high-end web applications in PHP, MySQL and AJAX</li><li style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; overflow-wrap: break-word; list-style: unset; font-family: var(--font-family,&quot;sans-serif&quot;) !important;">To research and implement new technologies.</li></ul>',
        ]);


    }
}
