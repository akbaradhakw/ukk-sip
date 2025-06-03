import AppLayout from '@/layouts/app-layout';
import { Head, Link, useForm } from '@inertiajs/react';
import { type BreadcrumbItem } from '@/types';
import { Mail, Phone, MapPin, Globe, Briefcase } from 'lucide-react';
import { useEffect } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Industries',
    href: '/industries',
  },
];

type Industry = {
  id: number;
  name: string;
  business_fields: string;
  address: string;
  phone: string;
  email: string;
  website: string;
  logo: string | null;
};

type PaginatedIndustries = {
  data: Industry[];
  links: {
    url: string | null;
    label: string;
    active: boolean;
  }[];
};

type Props = {
  industries: PaginatedIndustries;
  filters: {
    search: string;
  };
};

function Pagination({ links }: { links: PaginatedIndustries['links'] }) {
  return (
    <div className="mt-8 flex flex-wrap justify-center gap-2">
      {links.map((link, index) => (
        <Link
          key={index}
          href={link.url ?? ''}
          preserveScroll
          preserveState
          dangerouslySetInnerHTML={{ __html: link.label }}
          className={`px-3 py-1 rounded text-sm ${
            link.active
              ? 'bg-white text-indigo-600 font-semibold'
              : 'bg-indigo-800 text-white hover:bg-indigo-700'
          } ${!link.url ? 'pointer-events-none opacity-50' : ''}`}
        />
      ))}
    </div>
  );
}

export default function Industries({ industries, filters }: Props) {
  const { data, setData, get } = useForm({
    search: filters.search || '',
  });

  useEffect(() => {
    const timeout = setTimeout(() => {
      get('/industries', {
        preserveState: true,
        preserveScroll: true,
      });
    }, 500);

    return () => clearTimeout(timeout); // clear timeout saat component unmount / input berubah
  }, [data.search]);

  return (
    <AppLayout breadcrumbs={breadcrumbs}>
      <Head title="Industries" />

      <div className="bg-indigo-950 p-5 space-y-6 min-h-screen">
        <h2 className="text-white text-2xl font-bold">Daftar Industri</h2>

        {/* 🔍 Auto-search input */}
        <input
          type="text"
          value={data.search}
          onChange={(e) => setData('search', e.target.value)}
          placeholder="Cari nama industri..."
          className="w-full md:w-1/2 p-3 rounded bg-white text-black focus:outline-none mb-6"
        />

        {/* 🏭 List of Industries */}
        {industries.data.map((industry) => (
          <div
            key={industry.id}
            className="bg-gradient-to-br from-cyan-600 to-blue-500 text-white rounded-xl shadow-md p-4 space-y-3 transform transition duration-300 hover:scale-102 hover:shadow-lg cursor-pointer"
          >
            <div className="flex items-center justify-between mb-2">
              <h2 className="text-lg font-semibold">{industry.name}</h2>
              <div className="bg-white/20 p-2 rounded-full">
                <Briefcase className="w-4 h-4" />
              </div>
            </div>

            <div className="bg-white/10 rounded-lg p-4 space-y-3 text-sm">
              <div className="flex items-center gap-3">
                <Briefcase className="w-4 h-4 shrink-0" />
                <span className="truncate">{industry.business_fields}</span>
              </div>

              <div className="flex items-center gap-3">
                <Mail className="w-4 h-4 shrink-0" />
                <a
                  href={`mailto:${industry.email}`}
                  className="underline text-white hover:text-gray-200 truncate"
                >
                  {industry.email}
                </a>
              </div>

              <div className="flex items-center gap-3">
                <Phone className="w-4 h-4 shrink-0" />
                <span>{industry.phone}</span>
              </div>

              <div className="flex items-center gap-3">
                <MapPin className="w-4 h-4 shrink-0" />
                <span className="truncate">{industry.address}</span>
              </div>

              {industry.website && (
                <div className="flex items-center gap-3">
                  <Globe className="w-4 h-4 shrink-0" />
                  <a
                    href={industry.website}
                    target="_blank"
                    rel="noopener noreferrer"
                    className="underline text-white hover:text-gray-200 truncate"
                  >
                    {industry.website}
                  </a>
                </div>
              )}
            </div>
          </div>
        ))}

        <Pagination links={industries.links} />
      </div>
    </AppLayout>
  );
}
