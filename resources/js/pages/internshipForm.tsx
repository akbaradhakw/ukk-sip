import AppLayout from '@/layouts/app-layout';
import { Head, useForm } from '@inertiajs/react';
import { type BreadcrumbItem } from '@/types';
import { FormEventHandler } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Industries',
    href: '/industries',
  },
];

type Teacher = { name: string; id: number }[];
type Industry = { name: string; id: number }[];
type Student = { name: string; id: number } | null;

type Props = {
  student: Student;
  teacher: Teacher | null;
  industries: Industry | null;
  error?: string;
  success?: string;
};

export default function InternshipForm({ student, teacher, industries }: Props) {
  const { data, errors, post, cancel, setData } = useForm({
    student_id: student?.id || '',
    industry_id: '',
    teacher_id: '',
    start: '',
    end: '',
  });

  const submit: FormEventHandler = (e) => {
    e.preventDefault();
    post(route('internship.store'), {
      onSuccess: () => cancel(),
      onError: (errors) => console.error(errors),
    });
  };

  return (
    <AppLayout breadcrumbs={breadcrumbs}>
      <Head title="Internship Form" />
      <div className="max-w-4xl mx-auto bg-zinc-900 text-white p-8 rounded-md shadow-lg">
        <h1 className="text-3xl font-bold mb-6">Internship Form</h1>

        {errors && Object.keys(errors).length > 0 && (
          <div className="bg-red-600 text-white p-4 rounded mb-6">
            <ul className="list-disc list-inside space-y-1">
              {Object.entries(errors).map(([key, value]) => (
                <li key={key}>{value}</li>
              ))}
            </ul>
          </div>
        )}

        <form onSubmit={submit} className="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div className="md:col-span-2">
            <label className="block text-sm font-semibold">Student</label>
            <p className="mt-1 text-lg font-medium">{student?.name}</p>
          </div>

          <div>
            <label htmlFor="industry" className="block text-sm font-semibold">Industry</label>
            <select
              id="industry"
              className="mt-1 w-full bg-zinc-800 text-white border border-zinc-700 rounded-md p-2 focus:ring-blue-500"
              onChange={(e) => setData('industry_id', e.target.value)}
              value={data.industry_id}
              required
            >
              <option value="">Select Industry</option>
              {industries?.map((i) => (
                <option key={i.id} value={i.id}>{i.name}</option>
              ))}
            </select>
          </div>

          <div>
            <label htmlFor="teacher" className="block text-sm font-semibold">Teacher</label>
            <select
              id="teacher"
              className="mt-1 w-full bg-zinc-800 text-white border border-zinc-700 rounded-md p-2 focus:ring-blue-500"
              onChange={(e) => setData('teacher_id', e.target.value)}
              value={data.teacher_id}
              required
            >
              <option value="">Select Teacher</option>
              {teacher?.map((t) => (
                <option key={t.id} value={t.id}>{t.name}</option>
              ))}
            </select>
          </div>

          <div>
            <label className="block text-sm font-semibold">Start Date</label>
            <input
              type="date"
              className="mt-1 w-full bg-zinc-800 text-white border border-zinc-700 rounded-md p-2 focus:ring-blue-500"
              onChange={(e) => setData('start', e.target.value)}
              value={data.start}
              required
            />
          </div>

          <div>
            <label className="block text-sm font-semibold">End Date</label>
            <input
              type="date"
              className="mt-1 w-full bg-zinc-800 text-white border border-zinc-700 rounded-md p-2 focus:ring-blue-500"
              onChange={(e) => setData('end', e.target.value)}
              value={data.end}
              required
            />
          </div>

          <div className="md:col-span-2 flex justify-end space-x-3 mt-4">
            <button
              type="button"
              onClick={cancel}
              className="px-4 py-2 border border-gray-600 text-gray-300 rounded hover:bg-gray-700"
            >
              Cancel
            </button>
            <button
              type="submit"
              className="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded"
            >
              Submit
            </button>
          </div>
        </form>
      </div>
    </AppLayout>
  );
}
