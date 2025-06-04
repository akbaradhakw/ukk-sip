import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';
import StudentInfoCard from '@/components/dashboard/StudentInfoCard';
import InternshipInfoCard from '@/components/dashboard/InternshipInfoCard';
import TeacherInfoCard from '@/components/dashboard/TeacherInfoCard';

const breadcrumbs: BreadcrumbItem[] = [{ title: 'Dashboard', href: '/dashboard' }];

interface Student {
    name: string;
    nis: string;
    gender_label: string;
    phone: string;
    address: string;
    email: string;
    photo: string;
    status_label: string;
}

type Internship = {
    teacher_id: number;
    industry_id: number;
    start: string;
    end: string;
    teacher?: {
        name: string;
        nip: string;
        phone: string;
    };
    industry?: {
        name: string;
    };
};

type Props = {
    student: Student | null;
    internship: Internship | null;
};

export default function Dashboard({ student, internship }: Props) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="p-6 bg-indigo-950 min-h-screen text-white space-y-6">
                <div className="flex flex-col md:flex-row gap-6">
                    <div className="w-full md:w-1/2">
                        <StudentInfoCard student={student} />
                    </div>
                    <div className="w-full md:w-1/2">
                        <InternshipInfoCard internship={internship} />
                    </div>
                </div>
                {internship?.teacher && <TeacherInfoCard teacher={internship.teacher} />}
            </div>
        </AppLayout>
    );
}
