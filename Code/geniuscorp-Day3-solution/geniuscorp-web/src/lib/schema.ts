// Schema builders: ทุกฟังก์ชันรับข้อมูลจาก API/site.ts แล้วคืน object ตาม Schema.org
import { SITE, absoluteUrl } from './site'
import type { Article, Faq, Portfolio, Service, TeamMember } from './types'

export type Schema = Record<string, unknown>

// @id คงที่ของ "ตัวตน" หลัก ใช้อ้างอิงข้ามหน้า
export const ORG_ID = `${SITE.url}/#organization`
export const WEBSITE_ID = `${SITE.url}/#website`
export const personId = (member: Pick<TeamMember, 'slug'>) => `${SITE.url}/team/#${member.slug}`

// ── Organization / LocalBusiness ─────────────────────────────────────────────
export function organizationSchema(): Schema {
  return {
    '@type': ['Organization', 'LocalBusiness'],
    '@id': ORG_ID,
    name: SITE.name,
    legalName: SITE.legalName,
    url: SITE.url + '/',
    logo: {
      '@type': 'ImageObject',
      url: absoluteUrl(SITE.logo),
    },
    image: absoluteUrl(SITE.defaultOgImage),
    telephone: SITE.telephone,
    email: SITE.email,
    foundingDate: SITE.foundingDate,
    address: {
      '@type': 'PostalAddress',
      ...SITE.address,
    },
    geo: {
      '@type': 'GeoCoordinates',
      latitude: SITE.geo.latitude,
      longitude: SITE.geo.longitude,
    },
    openingHours: SITE.openingHours,
    sameAs: SITE.sameAs,
  }
}

// ── WebSite + SearchAction ───────────────────────────────────────────────────
export function websiteSchema(options: { hasSearch?: boolean } = {}): Schema {
  return {
    '@type': 'WebSite',
    '@id': WEBSITE_ID,
    url: SITE.url + '/',
    name: SITE.name,
    description: SITE.defaultDescription,
    inLanguage: SITE.language,
    publisher: { '@id': ORG_ID },
    ...(options.hasSearch && {
      potentialAction: {
        '@type': 'SearchAction',
        target: {
          '@type': 'EntryPoint',
          urlTemplate: `${SITE.url}/search/?q={search_term_string}`,
        },
        'query-input': 'required name=search_term_string',
      },
    }),
  }
}

// ── WebPage ──────────────────────────────────────────────────────────────────
export function webPageSchema(input: {
  url: string
  name: string
  description: string
  datePublished?: string | null
  dateModified?: string | null
  type?: 'WebPage' | 'AboutPage' | 'ContactPage' | 'CollectionPage' | 'ProfilePage'
}): Schema {
  const pageUrl = absoluteUrl(input.url)
  return {
    '@type': input.type ?? 'WebPage',
    '@id': `${pageUrl}#webpage`,
    url: pageUrl,
    name: input.name,
    description: input.description,
    inLanguage: SITE.language,
    isPartOf: { '@id': WEBSITE_ID },
    about: { '@id': ORG_ID },
    datePublished: input.datePublished ?? undefined,
    dateModified: input.dateModified ?? undefined,
  }
}

// ── Service + Offer ──────────────────────────────────────────────────────────
export function serviceSchema(service: Service): Schema {
  const url = absoluteUrl(service.url)
  return {
    '@type': 'Service',
    '@id': `${url}#service`,
    name: service.name,
    description: service.short_description,
    url,
    serviceType: service.name,
    provider: { '@id': ORG_ID },
    areaServed: { '@type': 'Country', name: 'Thailand' },
    ...(service.price_from !== null && {
      offers: {
        '@type': 'Offer',
        price: service.price_from,
        priceCurrency: service.price_currency,
        priceSpecification: {
          '@type': 'PriceSpecification',
          minPrice: service.price_from,
          priceCurrency: service.price_currency,
        },
        availability: 'https://schema.org/InStock',
        url,
      },
    }),
  }
}

// ── Article ──────────────────────────────────────────────────────────────────
export function articleSchema(article: Article): Schema {
  const url = absoluteUrl(article.url)
  return {
    '@type': 'Article',
    '@id': `${url}#article`,
    headline: article.title.slice(0, 110),
    description: article.excerpt,
    url,
    mainEntityOfPage: { '@id': `${url}#webpage` },
    image: article.cover_image ? [absoluteUrl(article.cover_image)] : undefined,
    datePublished: article.published_at ?? undefined,
    dateModified: article.updated_at ?? article.published_at ?? undefined,
    inLanguage: SITE.language,
    author: { '@id': personId(article.author) },
    publisher: { '@id': ORG_ID },
    isPartOf: { '@id': WEBSITE_ID },
  }
}

// ── Person ───────────────────────────────────────────────────────────────────
export function personSchema(member: TeamMember): Schema {
  return {
    '@type': 'Person',
    '@id': personId(member),
    name: member.name,
    jobTitle: member.job_title,
    description: member.bio ?? undefined,
    image: member.photo ? absoluteUrl(member.photo) : undefined,
    url: absoluteUrl(member.url),
    email: member.email ?? undefined,
    worksFor: { '@id': ORG_ID },
    sameAs: member.social_links.length ? member.social_links : undefined,
  }
}

// ── BreadcrumbList ───────────────────────────────────────────────────────────
export interface Crumb {
  name: string
  url?: string
}

export function breadcrumbSchema(crumbs: Crumb[]): Schema {
  return {
    '@type': 'BreadcrumbList',
    itemListElement: crumbs.map((crumb, index) => ({
      '@type': 'ListItem',
      position: index + 1,
      name: crumb.name,
      item: crumb.url ? absoluteUrl(crumb.url) : undefined,
    })),
  }
}

// ── FAQPage ──────────────────────────────────────────────────────────────────
export function faqSchema(faqs: Faq[]): Schema | null {
  if (!faqs.length) return null
  return {
    '@type': 'FAQPage',
    mainEntity: faqs.map((faq) => ({
      '@type': 'Question',
      name: faq.question,
      acceptedAnswer: {
        '@type': 'Answer',
        text: faq.answer,
      },
    })),
  }
}

// ── CreativeWork สำหรับผลงาน ─────────────────────────────────────────────────
export function portfolioSchema(item: Portfolio): Schema {
  const url = absoluteUrl(item.url)
  return {
    '@type': 'CreativeWork',
    '@id': `${url}#work`,
    name: item.title,
    description: item.summary,
    url,
    image: item.cover_image ? absoluteUrl(item.cover_image) : undefined,
    dateCreated: item.completed_at ?? undefined,
    creator: { '@id': ORG_ID },
    ...(item.client_name && {
      sourceOrganization: { '@type': 'Organization', name: item.client_name },
    }),
  }
}

// ── ItemList สำหรับหน้ารวม ───────────────────────────────────────────────────
export function itemListSchema(items: { name: string, url: string }[]): Schema {
  return {
    '@type': 'ItemList',
    itemListElement: items.map((item, index) => ({
      '@type': 'ListItem',
      position: index + 1,
      name: item.name,
      url: absoluteUrl(item.url),
    })),
  }
}

// ── ประกอบเป็น @graph พร้อม @context เดียว ───────────────────────────────────
export function graph(...schemas: (Schema | null | undefined)[]): Schema {
  return {
    '@context': 'https://schema.org',
    '@graph': schemas.filter((s): s is Schema => Boolean(s)),
  }
}
