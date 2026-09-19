// ค่ากลางของเว็บ: แก้ที่นี่ที่เดียว มีผลกับ Metadata, JSON-LD, Footer และ llms.txt

export const SITE = {
  name: 'GeniusCorp',
  legalName: 'GeniusCorp Co., Ltd.',
  url: 'https://www.geniuscorp.example',
  locale: 'th_TH',
  language: 'th',
  defaultTitle: 'GeniusCorp - บริษัทพัฒนาซอฟต์แวร์และเว็บไซต์องค์กรที่ AI ค้นเจอ',
  defaultDescription:
    'GeniusCorp รับพัฒนาเว็บไซต์องค์กร โมบายแอป และให้คำปรึกษา GEO/AEO ส่งมอบแล้วมากกว่า 40 โปรเจกต์ ทีมประสบการณ์ 15 ปี',
  defaultOgImage: '/images/og/default.jpg',
  logo: '/images/logo.png',
  foundingDate: '2011',
  telephone: '+66-2-000-0000',
  email: 'hello@geniuscorp.example',
  address: {
    streetAddress: '123 ถนนสุขุมวิท แขวงคลองเตย',
    addressLocality: 'เขตคลองเตย',
    addressRegion: 'กรุงเทพมหานคร',
    postalCode: '10110',
    addressCountry: 'TH',
  },
  geo: { latitude: 13.7222, longitude: 100.585 },
  openingHours: 'Mo-Fr 09:00-18:00',
  sameAs: [
    'https://www.facebook.com/geniuscorp.example',
    'https://www.linkedin.com/company/geniuscorp-example',
    'https://github.com/geniuscorp-example',
  ],
} as const

// แปลง path จาก API (/services/x/) ให้เป็น absolute URL
export function absoluteUrl(path: string): string {
  return new URL(path, SITE.url).toString()
}
