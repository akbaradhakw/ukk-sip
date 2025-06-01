import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';
import moment from 'moment';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
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
    phone: string
  };
  industry?: {
    name: string;
  };
};

type Props = {
    student: Student | null;
    internship: Internship | null;

};

export default function Dashboard({ student,internship }: Props)  {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="p-6">
                <h1 className="text-2xl font-bold mb-4">Profil Siswa</h1>

                {student ? (
                    <div>
                        <img
                            src={`/storage/${student.photo}`}
                            alt="Foto Siswa"
                            className="w-32 h-32 rounded-full mb-4"
                        />
                        <p><strong>Nama:</strong> {student.name}</p>
                        <p><strong>NIS:</strong> {student.nis}</p>
                        <p><strong>Jenis Kelamin:</strong> {student.gender_label}</p>
                        <p><strong>No. HP:</strong> {student.phone}</p>
                        <p><strong>Email:</strong> {student.email}</p>
                        <p><strong>Alamat:</strong> {student.address}</p>
                        <p><strong>Status PKL:</strong> {student.status_label}</p>
                    </div>
                ) : (
                    <p className="text-red-500">Data siswa tidak ditemukan.</p>
                )}

                {internship ? (
                    <div className="mt-6">
                        <div>
                            <div>
                                <h2 className="text-xl font-semibold mb-2">Informasi PKL</h2>

                                <p><strong>Industri:</strong> {internship.industry?.name}</p>
                                <p><strong>Mulai:</strong> {moment(internship.start).format('DD MMMM YYYY')}</p>
                                <p><strong>Selesai:</strong> {moment(internship.end).format('DD MMMM YYYY')}</p> 

                            </div>
                            <div>
                                <h2 className="text-xl font-semibold mb-2 mt-2">Informasi Pembimbing</h2>
                                <p><strong>Guru Pembimbing:</strong> {internship.teacher?.name}</p>
                                <p><strong>NIP</strong>{internship.teacher?.nip}</p>
                                <p><strong>Kontak</strong>{internship.teacher?.phone}</p>
                            </div>
                        </div>

                    </div>
                ) : (
                    <p className="text-red-500 mt-4">Data PKL tidak ditemukan.</p>
                )}
            </div>
        </AppLayout>
    );
}
