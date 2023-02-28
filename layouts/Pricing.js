import config from "@config/config.json";
import { markdownify } from "@lib/utils/textConverter";
import Link from 'next/Link'

const Pricing = ({ data }) => {
  const { frontmatter } = data;
  const { title, info } = frontmatter;
  const { contact_form_action } = config.params;

  return (
    <section className="section">
      <div className="container">
        {markdownify(title, "h1", "text-center font-normal")}
        <div className="section row pb-0">
          <div className="col-12 md:col-6 lg:col-7">
            <form
              className="contact-form"
              method="POST"
              action={contact_form_action}
            >
              <div className="mb-3">
                <input
                  className="form-input w-full rounded"
                  name="name"
                  type="text"
                  placeholder="Name"
                  required
                />
              </div>

              <div className="mb-3">
                <input
                  className="form-input w-full rounded"
                  name="price"
                  type="number"
                  placeholder="Price in USD"
                  required
                />
              </div>

              <div className="mb-3">
                <input
                  className="form-input w-full rounded"
                  name="subject"
                  type="Date"
                  placeholder="Enter current date"
                  required
                />
              </div>

              <div className="mb-3">
                <textarea
                  className="form-textarea w-full rounded-md"
                  rows="7"
                  placeholder="Your message"
                />
              </div>

              <Link href={"/transaction"}>
                <button onSubmit={() => sub} className="btn btn-primary">
                  Send Now
                </button>
              </Link>
            </form>
          </div>
          <div className="content col-12 md:col-6 lg:col-5">
            {markdownify(info.title, "h4")}
            {markdownify(info.description, "p", "mt-4")}
            <ul className="contact-list mt-5">
              {info.contacts.map((contact, index) => (
                <li key={index}>
                  {markdownify(contact, "strong", "text-dark")}
                </li>
              ))}
            </ul>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Pricing;
