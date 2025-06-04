import AppLayout from '@/layouts/app-layout';
import { Head, useForm } from '@inertiajs/react';
import { type BreadcrumbItem } from '@/types';
import { FormEventHandler } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'IndustryCreate',
    href: '/industryCreate',
  },
];

type Industry = { 
  name : string;
  address : string;
  phone : string;
  email : string;
  website : string;
  business_fields : string;
};

type Props = {
  industries: Industry | null;
  error?: string;
  success?: string;
};

export default function industryCreate() {
  const { data, errors, post, cancel, setData } = useForm({
    name: '',
    address: '',
    phone: '',
    email: '',
    website: '',
    business_fields: '',
  });

  const submit: FormEventHandler = (e) => {
    e.preventDefault();
    post(route('industries.store'), {
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
          <div>
            <label htmlFor="industry" className="block text-sm font-semibold">Nama Industri</label>
            <input
              type="text"
              className="mt-1 w-full bg-zinc-800 text-white border border-zinc-700 rounded-md p-2 focus:ring-blue-500"
              onChange={(e) => setData('name', e.target.value)}
              value={data.name}
              required
            />
          </div>

          <div>
            <label className="block text-sm font-semibold">address</label>
                          <input
              type="text"
              className="mt-1 w-full bg-zinc-800 text-white border border-zinc-700 rounded-md p-2 focus:ring-blue-500"
              onChange={(e) => setData('address', e.target.value)}
              value={data.address}
              required
            />
          </div>

          <div>
            <label className="block text-sm font-semibold">phone</label>
            <input
              type="text"
              className="mt-1 w-full bg-zinc-800 text-white border border-zinc-700 rounded-md p-2 focus:ring-blue-500"
              onChange={(e) => setData('phone', e.target.value)}
              value={data.phone}
              required
            />
          </div>

          <div>
            <label className="block text-sm font-semibold">email</label>
            <input
              type="text"
              className="mt-1 w-full bg-zinc-800 text-white border border-zinc-700 rounded-md p-2 focus:ring-blue-500"
              onChange={(e) => setData('email', e.target.value)}
              value={data.email}
              required
            />
          </div>
          <div>
            <label className="block text-sm font-semibold">website</label>
            <input
              type="text"
              className="mt-1 w-full bg-zinc-800 text-white border border-zinc-700 rounded-md p-2 focus:ring-blue-500"
              onChange={(e) => setData('website', e.target.value)}
              value={data.website}
              required
            />
          </div>          
          <div>
            <label className="block text-sm font-semibold">business_fields</label>
            <input
              type="text"
              className="mt-1 w-full bg-zinc-800 text-white border border-zinc-700 rounded-md p-2 focus:ring-blue-500"
              onChange={(e) => setData('business_fields', e.target.value)}
              value={data.business_fields}
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
